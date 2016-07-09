<?php

    /**
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-7-9
     * Time: 下午4:18
     *
     * license GPL
     */
    class FlexiHash
    {
        /**
         * 已知服务器列表
         *
         * @var array
         */
        private $serverList = [];
        /**
         * 是否排过序了
         * @var bool
         */
        private $isSorted = false;

        /**
         * 初始化信息
         */
        public function __construct(){

        }

        /**
         * 向hash环上添加服务器
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         */
        public function addServer($server){
            $index = $this->hashFunc($server);

            if(!isset($this->serverList[$index])){
                $this->serverList[$index] = $server;
            }

            $this->isSorted = False;
            return true;
        }

        /**
         * 从hash环上移出服务器
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         */
        public function removeServer($server){
            $index = $this->hashFunc($server);
            if(isset($this->serverList[$index])){
                unset($this->serverList[$index]);
            }

            $this->isSorted = False;
        }

        /**
         * 查找key在那个服务器上
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         */
        public function lookup($key){
            $index = $this->hashFunc($key);

            //判断是否排过序了
            if(!$this->isSorted){
                krsort($this->serverList);
                $this->isSorted = true;
            }

            foreach($this->serverList as $pos=>$server){
                if($index >= $pos){
                    return $server;
                }
            }

            return end($this->serverList);
        }

        /**
         * 返回服务器列表
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         * @return array
         */
        public function getAllServer(){
            if(!$this->isSorted)
                krsort($this->serverList);
            return $this->serverList;
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
        public function hashFunc($key){
            //获取8个字符
            $md5 = substr(md5($key),0,8);
            $seed = 31;
            $hash = 0;

            //计算一个hash值
            for($i = 0; $i<8;$i++){
                $hash = $hash*$seed + ord($md5{$i});
            }

            //位运算, max 0x7fffffff
            return $hash & 0xFFFFFFFF;
        }
    }