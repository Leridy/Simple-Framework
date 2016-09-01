<?php
/**
 * REBEL PHP 基本配置文件.
 * User: wanghui
 * Date: 16/8/29
 * Time: 08:50
 */
return array(
//    'DEFAULT_MODULE'                    => 'Home',
//    'DEFAULT_CONTROLLER'                => 'Index',
//    'DEFAULT_ACTION'                    => 'index',
    /**********************************数据库配置********************************/
    'database_type' => 'mysql',
    'database_name' => 'wayneBase',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    /**********************************日志文件配置 *******************************/
    'LOG_PATH' => 'Log',
    'DRIVER' => 'File',
    'POSTFIX_LOG' => 'log',
);