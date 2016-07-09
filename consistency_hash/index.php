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
