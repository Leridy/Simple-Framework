<?php
/**
 * Created by PhpStorm.
 * User: wanghui
 * Date: 16/8/28
 * Time: 17:40
 */

namespace core\Lib;
use core\Lib\Config;

class Model extends \medoo
{
    protected $pdo;
    function __construct()
    {
        $option = Config::all('db');
        parent::__construct($option);
//        $dsn      = C('DB_TYPE').':host='.C('DB_HOST').';dbname='.C('DB_NAME');
//        $username = C('DB_USER');
//        $passwd   = C('DB_PWD');
//        try{
//            parent::__construct($dsn, $username, $passwd);
//        }catch(\PDOException $e){
//            dump($e->getMessage());
//        }

    }

    /**
     * Mysql查询
     * @param $sql
     * @return array
     */
//    public function select($sql)
//    {
//        $result = parent::query($sql)->fetchAll();
//        return $result;
//    }
//    static public function find()
//    {
//
//    }
//
//    static public function delete()
//    {
//
//    }
//    static public function update()
//    {
//
//    }
}