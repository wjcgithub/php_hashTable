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
    include_once "FlexiHash.php";
    $mObj = MemServerSetting::getInstance();
//    print_r($mObj->getMemServer('name'));
//    print_r($mObj->getMemServer('age'));
//    print_r($mObj->getMemServer('sex'));

    $FlexiObj = new FlexiHash();
    $FlexiObj->addServer('192.168.1.123');
    $FlexiObj->addServer('192.168.1.124');
    $FlexiObj->addServer('192.168.1.125');
    $FlexiObj->addServer('192.168.1.126');
    $FlexiObj->addServer('192.168.1.127');
    $FlexiObj->addServer('192.168.1.227');
    $FlexiObj->addServer('192.168.1.7');
    $FlexiObj->addServer('192.168.1.197');

    print_r($FlexiObj->getAllServer());

    echo $FlexiObj->lookup('name');
    echo "\r\n";
    echo $FlexiObj->lookup('name1');
    echo "\r\n";
    echo $FlexiObj->lookup('name2');
    echo "\r\n";
    echo $FlexiObj->lookup('age');
    echo "\r\n";


    $FlexiObj->removeServer('192.168.1.126');
    $FlexiObj->removeServer('192.168.1.127');
    $FlexiObj->removeServer('192.168.1.227');
    $FlexiObj->removeServer('192.168.1.7');
    $FlexiObj->removeServer('192.168.1.197');

    print_r($FlexiObj->getAllServer());