<?php

    /**
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-7-8
     * Time: 下午1:27
     *
     * license GPL
     */
    class HashNode
    {
        public $key;
        public $value;
        public $nextNode;

        /**
         * @param      $key
         * @param      $value
         * @param null $nextNode
         */
        public function __construct($key, $value, $nextNode=null){
            $this->key = $key;
            $this->value = $value;
            $this->nextNode = $nextNode;
        }
    }