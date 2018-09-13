<?php 
/*
 * @Author: LinhMy 
 * @Date: 2018-07-19 11:02:05 
 * @Last Modified by:   LinhMy 
 * @Last Modified time: 2018-07-19 11:02:05 
 */
namespace App\Commons\Adapter;


use League\Flysystem\Exception;

abstract class Cache
{
    public $cache;
    public $expired_time;
    public $cache_on = 1;

    public function __construct($config)
    {
        $this->cache = \Illuminate\Support\Facades\Cache::store($config['type']);

    }

    public function getExpriedtime(){
        return $this->expired_time;
    }

    public function setExpriedtime($expired_time){
        $this->expired_time = $expired_time;
    }

    public function get($key){
        if(empty($key)){
            throw new \Exception('Redis param valid');
        }
        return $this->cache->get($key);
    }

    public function set($key, $value){
        if(empty($key) && empty($value) ){
            throw new \Exception('Redis param valid');
        }
        $this->cache->set($key, $value, $this->getExpriedtime());
    }


}
?>