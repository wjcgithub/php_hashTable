<?php

    /**
     *
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-7-8
     * Time: 上午9:33
     *
     * license GPL
     */
    class MemServerSetting
    {
        //hashtable size
        private $size = 100;
        private static $instance;
        private $memServer=[];

        /**
         * 初始化hash表
         *
         */
        private function __construct(){
            //部署缓存服务器
            $this->setMemServer();
            //设置缓存服务器的个数
            $this->size = count($this->memServer);
        }

        private function __clone(){
            echo 'not instance';
        }

        /**
         * 部署缓存服务器
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         */
        private function setMemServer(){
            $this->memServer = [
                ['host'=>'192.168.1.123', 'port'=>6379],
                ['host'=>'192.168.1.321', 'port'=>6379],
            ];
        }

        /**
         * 选择合适的缓存服务器
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         *
         * @param $key
         */
        public function getMemServer($key){
            $index = $this->hashFunc($key);
            return $this->memServer[$index];
        }

        /**
         * 获取一个缓存服务的实例
         *
         * @author: jichao.wang <braveontheroad@gmail.com>
         */
        static public function getInstance(){
            if(empty(self::$instance)){
                self::$instance = new MemServerSetting();
            }

            return self::$instance;
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