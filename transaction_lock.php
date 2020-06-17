<?php
/*
 * 事务加锁处理高并发问题
 * */
//、先添加 再回滚 确定没有问题，但是主键自增大幅度增加
$conn = mysqli_connect('127.0.0.1', 'root', 'root') or die(mysqli_error());
mysqli_select_db($conn, 'test');
mysqli_query($conn, 'BEGIN');
mysqli_query($conn, "insert into transaction(name) values ('mraz')");

$rs = mysqli_query($conn, 'SELECT count(*) as total FROM transaction WHERE name = "mraz" FOR UPDATE');
$row = mysqli_fetch_array($rs);
if($row['total']>1){
    //回滚
    echo "回滚";
    mysqli_query($conn, 'ROLLBACK');
}else{
    mysqli_query($conn, 'COMMIT');
    echo '添加成功';
}
mysqli_free_result($rs);
mysqli_close($conn);
die;

//网上找的 有漏网之鱼，不能彻底解决高并发  是什么原因呢  select for update 语句只需要有索引就能工作 给name加索引 就不会有错了 解决
$conn = mysqli_connect('127.0.0.1', 'root', 'root') or die(mysqli_error());
mysqli_select_db($conn, 'test');
mysqli_query($conn, 'BEGIN');
$rs = mysqli_query($conn, 'SELECT count(*) as total FROM transaction WHERE name = "mraz" FOR UPDATE');
$row = mysqli_fetch_array($rs);
if($row['total']>0){
    //回滚
    mysqli_query($conn, 'ROLLBACK');
    echo "exit";
}else{
    mysqli_query($conn, "insert into transaction(name) values ('mraz')");
    mysqli_query($conn, 'COMMIT');
    echo '添加成功';
}

mysqli_free_result($rs);
mysqli_close($conn);

//产生高并发
//$conn = mysqli_connect('127.0.0.1', 'root', 'root') or die(mysqli_error());
//mysqli_select_db($conn, 'test');
//$rs = mysqli_query($conn, 'select `number` from  storage where id=1 limit 1');
//$sql="select `number` from  storage where id=1 limit 1";
//$row = mysqli_fetch_array($rs);
//$number = $row['number'];
//if($number>0){
//    $sql = "insert into `order` (number) values ($number)";
//    mysqli_query($conn, $sql);
//    $order_id = mysqli_insert_id($conn);
//    if($order_id)
//    {
//        $sql="update storage set `number`=`number`-1 WHERE id=1";
//        mysqli_query($conn, $sql);
//    }
//}else{
//    echo '库存完了';
//}
//测试没有问题
$conn = mysqli_connect('127.0.0.1', 'root', 'root') or die(mysqli_error());
mysqli_select_db($conn, 'test');
mysqli_query($conn, 'BEGIN');
$rs = mysqli_query($conn, 'select `number` from  storage where id=1 limit 1 FOR UPDATE');
$sql="select `number` from  storage where id=1 limit 1";
$row = mysqli_fetch_array($rs);
$number = $row['number'];
if($number>0){
    $sql = "insert into `order` (number) values ($number)";
    mysqli_query($conn, $sql);
    $order_id = mysqli_insert_id($conn);
    if($order_id)
    {
        $sql="update storage set `number`=`number`-1 WHERE id=1";
        $res = mysqli_query($conn, $sql);
        if($res){
            mysqli_query($conn, 'COMMIT');
        }else{
            mysqli_query($conn, 'ROLLBACK');
        }
    }else{
        mysqli_query($conn, 'ROLLBACK');
    }
}else{
    echo '库存完了';
}

?>