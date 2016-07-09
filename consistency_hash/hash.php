<?php
    /**
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-7-9
     * Time: 下午12:22
     *
     * license GPL
     */

    function chash($key){
        //获取8个字符
        $md5 = substr(md5($key),0,8);
        $seed = 31;
        $hash = 0;

        //计算一个hash值
        for($i = 0; $i<8;$i++){
            $hash = $hash*$seed + ord($md5{$i});
        }

        //位运算, max 0x7fffffff
        return $hash & 0xFFFFFFFE;
    }

    $key = $_GET['key'];
    echo chash($key);
    exit;

