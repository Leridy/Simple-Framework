<?php
/**
 * 自动加载类.
 * User: wanghui
 * Date: 16/8/27
 * Time: 23:33
 */
namespace core;
use core\Lib\Log;

class Initial{

    // 防止重复引入类
    public static $classLib = array();

    static public function run() {
        // 开启路由
        $route = new \core\Lib\Route();
        $Module =  $route->module;
        $Controller =  $route->controller;
        $Action =  $route->action;
        // ......Controller.php控制器格式配置
        $ControllerFile = APP.'/'.$Module.'/Controller/'.$Controller.'Controller.php';
        $ControllerClass = '\\'.APP_NAME.'\\'.$Module.'\Controller\\'.$Controller.'Controller';

        if(is_file($ControllerFile)) {
            include $ControllerFile;
            $controller = new $ControllerClass;
            $controller->$Action();
        }else {
            throw new \Exception('找不到控制器'.$ControllerClass);
        }


    }

    // 自动加载类库
    static public function load($class) {

        if(isset( $classLib[$class] )) {
            return true;
        }else {
            $class = str_replace('\\','/',$class);

            $file  = REBELPHP.'/'.$class.'.class.php';
            if(is_file($file)) {
                include $file;
                self::$classLib[$class] = $class;
            }else {
                return false;
            }
        }

    }
    
}