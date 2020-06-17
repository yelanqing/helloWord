<?php
    /*
     * 1.redis 数据类型有 string 字符串 list 列表 set 集合 sorted set 有序集合 hash 哈希
     * 2. redis 与memcache的区别
     * 不同之处 redis 都是存在内存中 数据不能超过内存大小 会有部分存在硬盘中 重启后
     * memcache 只有一种数据类型 而redis 支持多种数据类型
     * redis value 值最大存储1GB 而 memcache 只能存1MB
     * 3. redis string 的用法
     * */

    $redis = new Redis();//创建对象
    $redis->connect('127.0.0.1',6379);//建立连接
    //单个存
    $redis->set('name','klc');
    //单个获取
    echo $redis->get('name')."\n";
    $mset = array("key1"=>'113231',"key2"=>'35436',"key3"=>'qwrw');
    //多个存
    $redis->mset($mset);
    $mget = array('key1','key2','key3');
    //多个获取
    $values = $redis->mget($mget);
    var_dump($values);
    echo "\n";
    //获取所有key
    $keys = $redis->keys("*");
    var_dump($keys);
    echo "\n";

    //判断key值是否过期
    $is_issset = $redis->exists('key4');
    var_dump($is_issset);
    echo "\n";
    //设置key过期时间
    $redis ->expire('key1',5);

    $key = 'key';
    $value = 12;


/*
 * string类型数据操作
 * */
    $redis->set($key,$value);
    var_dump($redis->get($key));
    $redis->incr($key);
    var_dump($redis->get($key));
    $redis->decr($key);
    var_dump($redis->get($key));
    //追加
    $redis->append($key,'我是');
    var_dump($redis->get($key));
    //获取key长度
    var_dump($redis->strlen($key));
    $redis->del($key);
/*
 * hash类型数据操作
 * */
    $redis->hset($key,'user_name','clover');
    var_dump($redis->hget($key,'user_name'));
    $redis->hmset($key,array('user_name'=>'clover1','age'=>28,'tel'=>'17791816917'));
    var_dump($redis->hget($key,'user_name'));
    var_dump($redis->hget($key,'age'));
    var_dump($redis->hmget($key,array('user_name','age','tel')));

    //获取所有hash值
    var_dump($redis->hgetall($key));
    //获取hash所有的key
    var_dump($redis->hkeys($key));
    //获取hash所有values
    var_dump($redis->hvals($key));
    //获取hash 所有健对值的个数
    var_dump($redis->hlen($key));
    //删除其中一个值怎么弄
    $redis->hdel($key,'user_name');
    //删除hash 共用的
    $redis->del($key);
    var_dump($redis->hgetall($key));

/*
 * list 类型数据操作
 * */
    $redis->lpush($key,1,2,3,4,1,2,3,4);
    var_dump($redis->lpop($key));
    var_dump($redis->rpop($key));
    //end -1  表示到最后
    var_dump($redis->lrange($key,0,-1));









?>