<?php

    /**
     * 没有考虑hash码冲突的情况
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-7-8
     * Time: 上午9:33
     *
     * license GPL
     */
    class HashTable
    {
        //hashtable size
        private $size = 100;
        private $buckets;

        /**
         * 初始化hash表
         */
        public function __construct(){
            $this->buckets = new SplFixedArray($this->size);
        }

        /**
         * hash 函数
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         *
         * @param $key
         *
         * @return int
         */
        private function hashFunc($key){
//            $len = strlen($key);
//            $sum = 0;
//            for($i=0; $i<$len; $i++){
//                $sum += ord($key[$i]);
//            }

            $sum = crc32($key);
            return $sum % $this->size;
        }

        /**
         * 添加元素到hash表中
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         *
         * @param $key
         * @param $value
         */
        public function add($key, $value){
            $index = $this->hashFunc($key);
            $this->buckets[$index] = $value;
            return true;
        }

        /**
         * 查找元素
         * @author: jichao.wang <braveontheroad@gmail.com>
         *
         * @param $key
         */
        public function find($key){
            $index = $this->hashFunc($key);
            if(isset($this->buckets[$index])){
                return $this->buckets[$index];
            }

            return NULL;
        }

        /**
         * 获取hashTable中的所有元素
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         * @return mixed
         */
        public function findAll(){
            return $this->buckets;
        }

    }