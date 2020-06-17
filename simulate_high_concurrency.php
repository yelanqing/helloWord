<?php
/*
 * curl模拟高并发
 *
 * */

ini_set("display_errors", "off");
header("Content-type: text/html; charset=utf-8");
$url='http://hlx.helloword.net/transaction_lock.php';
$num=1000;

$mh = curl_multi_init();
for ($i=0; $i<=$num; $i++) {
    $uid = rand(10000000, 99999999);
    $url .="?uid=".$uid."&goods_id=10001";
    $conn[$i]=curl_init($url);
    curl_setopt($conn[$i],CURLOPT_RETURNTRANSFER,1);
    curl_setopt($conn[$i], CURLOPT_TIMEOUT, 10);
    curl_multi_add_handle ($mh,$conn[$i]);
}

do {
    $mrc = curl_multi_exec($mh,$active);
} while ($mrc == CURLM_CALL_MULTI_PERFORM);
    while ($active and $mrc == CURLM_OK) {
        if (curl_multi_select($mh) != -1) {
            do {
                $mrc = curl_multi_exec($mh, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }
    }
?>