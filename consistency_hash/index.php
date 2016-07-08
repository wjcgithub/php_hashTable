<?php
    /**
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-7-8
     * Time: 下午4:26
     *
     * license GPL
     */
    include_once "MemServerSetting.php";
    $mObj = MemServerSetting::getInstance();
    print_r($mObj->getMemServer('name'));
    print_r($mObj->getMemServer('age'));
    print_r($mObj->getMemServer('sex'));

    function chash($key){
        $md5 = substr(md5($key),0,8);
        echo $md5;
        $seed = 31;
        $hash = 0;

        for($i = 0; $i<8;$i++){
            $hash = $hash*$seed + ord($md5{$i});
        }

        echo "\r\n";
        echo $hash;
        echo "\r\n";
        echo "crc32:".crc32($key);
        echo "\r\n";
        return $hash & 0x7FFFFFFF;
    }

    echo chash('name');
    echo "\r\n";
    echo 2740435799612 & 0x7FFFFFFF;
    echo bindec(100111111000001110101100111100111000111100 & 1111111111111111111111111111111);
    echo "\r\n";
    echo "end";
    echo "\r\n";
