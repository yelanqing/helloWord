<?php
/**
 * Created by PhpStorm.
 * User: yelanqing
 * Date: 2020-03-22
 * Time: 12:55
 * 用户抢购，存入用户队列
 */

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
//不，先查看已购队列中有没有该用户，有的话抢购成功 没有加入抢购队列
//查询 抢购成功的对列人数 ，人数等于库存数量 抢购结束


