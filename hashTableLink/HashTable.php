<?php

    /**
     * 使用拉链法防止hash冲突的解决方案
     *
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

            if(isset($this->buckets[$index])){
                $newNode = new HashNode($key, $value, $this->buckets[$index]);
            }else{
                $newNode = new HashNode($key, $value);
            }
            $this->buckets[$index] = $newNode;

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
                $curNode = $this->buckets[$index];
                while($curNode){
                    if($curNode->key==$key){
                        return $curNode->value;
                    }

                    $curNode = $curNode->nextNode;
                }
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