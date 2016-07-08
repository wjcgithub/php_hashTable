<?php
    /**
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-7-8
     * Time: 上午10:52
     *
     * license GPL
     */

    include_once "HashTable.php";
    $ht = new HashTable();
    $ht->add('name','wjc');
    $ht->add('anme','wjc');
    $ht->add('anem','wjc');
    $ht->add('name1','lisi');
    $ht->add('age',26);
    print_r($ht->findAll());
    echo $ht->find('name')."\r\n";
    echo $ht->find('age')."\r\n";
