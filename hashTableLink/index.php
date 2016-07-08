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
    include_once "HashNode.php";
    $ht = new HashTable();
    $ht->add('name','name');
    $ht->add('anme','anme');
    $ht->add('anem','anem');
    $ht->add('name1','lisi');
    $ht->add('age',26);
    print_r($ht->findAll());
    echo $ht->find('name')."\r\n";
    echo $ht->find('anme')."\r\n";
    echo $ht->find('anem')."\r\n";
    echo $ht->find('name1')."\r\n";
    echo $ht->find('age')."\r\n";
