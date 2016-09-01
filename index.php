<?php
/**
 * 入口文件.
 * Name       : REBELPHP
 * Description: 叛逆的PHP框架
 * User       : wanghui
 * Date       : 16/8/27
 * Time       : 23:11
 */
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC'); //设置中国时区
/****路由配置****/
define('DEFAULT_MODULE'     , 'Home');
define('DEFAULT_CONTROLLER' , 'Index');
define('DEFAULT_ACTION'     , 'index');
define('MODULE'             , 'g');
define('CONTROLLER'         , 'm');
define('ACTION'             , 'a');

// 当前目录
define('REBELPHP'           , realpath(''));

// 核心文件
define('CORE'               , REBELPHP.'/core');

// 工作区
define('APP'                , REBELPHP.'/app');
define('APP_NAME'           , 'app');

/**
 * 是否开启调试
 * true 开启
 * false 关闭
 **/
define('DEBUG', true);
if(DEBUG) {
    include "vendor/autoload.php";
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_error', 'On');
}else {
    ini_set('display_error', 'Off');
}

// 核心方法文件
include CORE.'/Common/functions.php';
// 核心类
include CORE.'/Initial.php';
// 类的自动加载
spl_autoload_register('\core\Initial::load');
\core\Initial::run();


