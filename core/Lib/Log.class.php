<?php
/**
 * REBEL 日志类
 * User: wanghui
 * Date: 16/8/31
 * Time: 08:41
 */

namespace core\Lib;


class Log
{
    static private $class;

    // 日志类初始化
    static public function init()
    {
        $driver = '\core\Lib\Driver\Log\\'.C('DRIVER');
        self::$class =  new $driver;
    }
    static public function log($message)
    {
        self::$class->log($message);
    }
}