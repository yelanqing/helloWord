<?php
/**
 * Created by PhpStorm.
 * User: yelanqing
 * Date: 2020-03-10
 * Time: 11:29
 */

/*$arr = "www.3cschool.com";
$arr1 = explode(".",$arr);
$arr = "www.3cschool.com";
$arr2 = str_split($arr,3);
var_dump($arr1);
var_dump($arr2);

$arr = ["php","java","paython"];
$str = implode(",",$arr);
var_dump($str);
$str = join(",",$arr);
var_dump($str);

$str = "sdgdhfjtyjtyjtrssssssssssss";
var_dump($str);
$str1 = substr($str,9);
var_dump($str1);
$str2 = substr($str,0,9);
var_dump($str2);
$str3 = substr($str,-9);
var_dump($str3);

$str = "php,java,paython";
$str1 = str_replace("php","java",$str);
var_dump($str1);

$str1 = preg_replace("/php|paython/","java",$str);
var_dump($str1);

$str = "http://hlx.helloword.net/phptest.php?id=1";
$str1 = strpos($str,"/");
var_dump($str1);
$str1 = strrpos($str,"/");
var_dump($str1);
$path = parse_url($str);
 */
//$arr = ['a'=>112,'b'=>250];
//$arr = array_values($arr);
//var_dump($arr);
//
//$str = "欢迎加入 客情公司";
////$str = str_replace(' ','',$str);
////$str =preg_replace('/ /', '', $str);
//$str = strtr($str,array(' '=>''));
//var_dump($str);
//
//$str = '11,22,33,44';
//$arr = explode(',',$str);
//var_dump($arr);
//$a = [
//    ['id' => 1000, 'sort' => 333, 'amount' => 200],
//    ['id' => 1000, 'sort' => 10000, 'amount' => 200],
//    ['id' => 1001, 'sort' => 980, 'amount' => 250, ],
//    ['id' => 1002, 'sort' => 950, 'amount' => 250, ]
//];
//$ids = array();
//$ids = array_map('array_shift', $a);
//$ids = array_column($a, 'id');
//$a = sort_test($a);
//var_dump($a);

//function sort_test($a){
//    $amount_arr = array_column($a,'amount');
//    $in_array = array();
//    array_multisort($amount_arr,SORT_DESC,$a);
//    foreach($a as $key=>$value){
//        $amount = $value['amount'];
//        //获取等于该amount值得数组数量
//        $num = array_count_values($amount_arr)[$amount];
//        if($num >1 && !in_array($amount,$in_array)){
//            $in_array[] = $amount;
//            //找出等于该amount值得全部数组
//            $new_arr = filter_by_value($a,'amount',$amount);
//            $amount_arr1 = $new_arr;
//            //重新排序
//            $sort_arr = array_column($new_arr,'sort');
//            array_multisort($sort_arr,SORT_ASC,$new_arr);
//            //替换
//            $i = 0;
//            foreach($amount_arr1 as $key1=>$value1){
//                $a[$key1] = $new_arr[$i];
//                $i++;
//            }
//
//        }
//    }
//    return $a;
//}
//
//function filter_by_value ($array, $index, $value){
//    if(is_array($array) && count($array)>0)
//    {
//        foreach(array_keys($array) as $key){
//            $temp[$key] = $array[$key][$index];
//            if ($temp[$key] == $value){
//                $newarray[$key] = $array[$key];
//            }
//        }
//    }
//    return $newarray;
//}
//$str = '欢迎加⼊ 克勤公司';
//$len = utf8_strlen($str);
//function utf8_strlen($string = null) {
//    // 将字符串分解为单元
//    preg_match_all("/./us", $string, $match);
//    // 返回单元个数
//    return count($match[0]);
//}

//function get_user_tel(){
//    $appid = 'wxcc41e47562b08129';
//    $secret='50e4379d67a6860d18157c53dc6ac3c2';
//    $code =$_GET['code'];
//    $weixin =  file_get_contents("https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&code=".$code."&grant_type=authorization_code");
//    $jsondecode = json_decode($weixin); //对JSON格式的字符串进行编码
//    //获取到 session_key，encryptedData，和 iv等参数
//    $array = get_object_vars($jsondecode);//转换成数组
//    //解密
//    include_once "wxBizDataCrypt.php";
//    $sessionKey = $array['session_key'];
//    $encryptedData=$array['encryptedData'];
//    $iv = $array['iv'];
//    $pc = new WXBizDataCrypt($appid, $sessionKey);
//    $errCode = $pc->decryptData($encryptedData, $iv, $data );
//    if ($errCode == 0) {
//        exit(json_encode(['error'=>0,'msg'=>'ok','data'=>$data]));
//    } else {
//        exit(json_encode(['error'=>1,'msg'=>$errCode]));
//    }
//}


////得到用户手机号相关信息  $data
//
//<?php
//
//use Lcobucci\JWT\Builder;
//use Lcobucci\JWT\Signer\Hmac\Sha256;
//use Lcobucci\JWT\Parser;
//
//class Jwt
//{
//
//    //生成token
//    public function createToken()
//    {
//        $key = 'abcd';
//        $signer = new Sha256();
//        $token = (new Builder())
//            ->setIssuedAt(time())//签发时间 'iat'
//            ->setNotBefore(time())//该时间之前不接收处理该token  'nbf'
//            ->setExpiration(time() + 3600)//过期时间
//            ->set('phone_number', 17791816917)//自定义字段 可以通过该字段判断用户身份
//            ->sign($signer, $key)//签名
//            ->getToken();
//
//        echo $token;
//
//
//    }
//
//    //验证token
//    public function validateToken()
//    {
//        $key = 'abcd';
//        $signer = new Sha256();
//        $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : '';
//        try {
//            $token = (new Parser())->parse((string)$token);
//
//            //判断token是否过期
//            if ($token->isExpired()) {
//                throw new Exception('已经过期');
//            }
//
//            //如果验证成功
//            if (true == ($token->verify($signer, $key))) {
//                //用户手机号
//                $phone_number = $token->getClaim('phone_number');  //用户id
//            } else {
//                throw new Exception('token错误');
//            }
//
//        } catch (\Exception $e) {
//            echo $e->getMessage();
//        }
//    }
//}

//自己写连接数据库过程
//$con = mysqli_connect('localhost','root','root');
////选择表
//mysqli_select_db($con,'test');
//$sql = "select * from transaction";
//$res = mysqli_query($con,$sql);
//while($row = mysqli_fetch_assoc($res)){
//    var_dump($row);
//}
//var_dump(mysqli_error($con));
//mysqli_close($con);

//测试之前可以报商品库存信息存入redis
//$redis = new Redis();
//$redis->connect("127.0.0.1",'6379');
//$redis->set("goods_store_10001",10);
//$redis->close();

$arr = array(13,3454,576,6787,454,2,454,6786);
//快速排序
//$sort_arr_asc = quick_sort($arr);
//var_dump($sort_arr_asc);
function quick_sort($arr){
    if(count($arr)<=1){
        return $arr;
    }
    $middle_num = $arr[0];
    $left = array();
    $right = array();
    for($i=1;$i<count($arr);$i++){
        if($middle_num >=$arr[$i]){
            $left[] = $arr[$i];
        }else{
            $right[] = $arr[$i];
        }
    }
    $left = quick_sort($left);
    $right = quick_sort($right);
    return array_merge($left,array($middle_num),$right);
}
//冒泡排序 小到大  这应该是选择排序
//$sort_arr_asc = my_sort($arr);
//var_dump($sort_arr_asc);
function my_sort($arr){
    if(count($arr)<=1){
        return $arr;
    }
    for($i=0;$i<count($arr);$i++){
        for($j=$i+1;$j<count($arr);$j++){
            if($arr[$i] >$arr[$j]){
                $num = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $num;
            }
        }
    }
    return $arr;
}
$arr = array(13,3454,576,6787,454,2,454,6786);//8
/*
 * 外面的也循环7次
 * 第一轮 下面的循环六次 8-1
 * 13,3454,576,6787,454,2,454,6786  比对 0 1
 * 13，576，3454,6787,454,2,454,6786 1 2
 * 13，576，3454,6787,454,2,454,6786 2 3
 * 13，576，3454,454,6787,2,454,6786 3，4
 * 13，576，3454,454,2,6787,454,6786 4，5
 * 13，576，3454,454,2,454,6787,6786 5，6
 * 13，576，3454,454,2,454,6786,6787 6，7
 * 第二轮 循环5次  8-2
 * 13，576，3454,454,2,454,6786,【6787】  比对 0 1
 * 13，576，3454,454,2,454,6786,【6787】 1 2
 * 13，576，454,3454,2,454,6786,【6787】 2 3
 * 13，576，454,2,3454,454,6786,【6787】 3，4
 * 13，576，454,2,454,3454,6786,【6787】 4，5
 * 13，576，454,2,454,3454,6786,【6787】 5，6
 *
 * 第三轮 循环4次
 * 13，576，454,2,454,3454,【6786】,【6787】 0 1
 * 13，576，454,2,454,3454,【6786】,【6787】1 2
 * 13，454，576,2,454,3454,【6786】,【6787】2 3
 * 13，454，2,576,454,3454,【6786】,【6787】3，4
 * 13，454，2,454,576,3454,【6786】,【6787】4，5
 * 第四轮 循环三次
 * 13，454，2,454,576,【3454】,【6786】,【6787】0 1
 * 13，2，454,454,576,【3454】,【6786】,【6787】1 2
 * 13，2，454,454,576,【3454】,【6786】,【6787】2 3
 * 13，2，454,454,576,【3454】,【6786】,【6787】3 4
 * 第五轮 循环两次
 * 13，2，454,454,【576】,【3454】,【6786】,【6787】0 1
 * 2，13，454,454,【576】,【3454】,【6786】,【6787】1 2
 * 2，13，454,454,【576】,【3454】,【6786】,【6787】2 3
 * 第六轮
 * 2，13，454,【454】,【576】,【3454】,【6786】,【6787】2 3
 * 2，13，454,【454】,【576】,【3454】,【6786】,【6787】2 3
 * 七轮
 * 2，13，【454】,【454】,【576】,【3454】,【6786】,【6787】2 3
 * */


//$sort_arr_asc = bulle_sort($arr);
function my_sort1($arr){
    $count = count($arr);
    if($count<=1){
        return $arr;
    }

    for($i=1;$i<$count;$i++){
        for($j=0;$j<$count-$i;$j++){
            if($arr[$j] >$arr[$j+1]){
                $num = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $num;
            }
        }
    }
    return $arr;
}

//冒泡排序
function bulle_sort($arr){
    $count = count($arr);
    if($count <=1){
        return false;
    }
    for($i=1;$i<$count;$i++){
        for($j=0;$j<$count-$i;$j++){
            if($arr[$j] >$arr[$j+1]){
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;

            }
        }
    }
    return $arr;
}


/*某个商城中用户消费1元送1积分，商家为了刺激用户消费，用户消费1000元送1200积分，消费2000元送2500积分，消费5000元送8000积分。
（1）用户消费1500元，应送____积分，消费4000元应送____积分，消费8500元应送____积分
（2）请写出一个函数实现上述逻辑，输入为用户消费的金额，输出为送的积分数量
*/

function getIntegral($consume) {
    $count_5000 = floor($consume / 5000);
    $consume = $consume - $count_5000 * 5000;
    $count_2000 = floor($consume / 2000);
    $consume = $consume - $count_2000 * 2000;
    $count_1000 = floor($consume / 1000);
    $consume = $consume - $count_1000 * 1000;
    return $count_5000 * 8000 + $count_2000 * 2500 + $count_1000 * 1200 + $consume;
}


function calc_integral($integral)
{
    $integral = intval($integral);
    if($integral >= 5000) {
        return 8000 + calc_integral($integral-5000);
    }
    if($integral >= 2000) {
        return 2500 + calc_integral($integral-2000);
    }
    if($integral >= 1000) {
        return 1200 + calc_integral($integral-1000);
    }
    return $integral;
}

//if('le3' == '1000') echo "LOL";
//$a = 'aabbzz';
//$a++;
//echo $a; //aabcaa
//$data = ['a','b','c'];
//foreach($data as $k=>$v){
//    $v = &$data[$k];
//}
//var_dump($data);

?>



