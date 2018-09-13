<?php 
/*
 * @Author: LinhMy 
 * @Date: 2018-07-19 11:02:29 
 * @Last Modified by:   LinhMy 
 * @Last Modified time: 2018-07-19 11:02:29 
 */
namespace App\Commons\Cache;


use App\Commons\Adapter\Cache;

class Home extends Cache
{
    static $instance;
    public function __construct($config = [])
    {
        $config['type'] = 'redis';
      //  $config['database'] = 'home';
        return parent::__construct($config);
    }


    public static function getInstance(){
        if(!static::$instance){
            static::$instance = new static();
        }
        return static::$instance;
    }

}
?>