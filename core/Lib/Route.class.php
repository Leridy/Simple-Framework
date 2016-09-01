<?php
/**
 * 路由类,解析URL.
 * User: wanghui
 * Date: 16/8/27
 * Time: 23:49
 */
namespace core\Lib;
class Route {
    public $module;
    public $controller;
    public $action;
    public function __construct()
    {
        // 默认
        $this->module     = DEFAULT_MODULE;
        $this->controller = DEFAULT_CONTROLLER;
        $this->action     = DEFAULT_ACTION;

        if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != '/') {

            $path = $_SERVER['QUERY_STRING'];
            $pathArr = explode('&', $path);
            foreach($pathArr as $k => $value) {
                $pathGroup[$k] = explode('=', $value);
            }
            foreach($pathGroup as $k => $value) {
                if($k < 3) {
                    // 模块
                    if($pathGroup[$k][0] === MODULE) {
                        if(isset($pathGroup[$k][1])) {
                            $this->module = $pathGroup[$k][1];
                            unset($pathGroup[$k]);
                            continue;
                        }
                    }
                    // 控制器
                    if($pathGroup[$k][0] === CONTROLLER) {
                        if(isset($pathGroup[$k][1])) {
                            $this->controller = $pathGroup[$k][1];
                            unset($pathGroup[$k]);
                            continue;
                        }
                    }
                    // 方法
                    if($pathGroup[$k][0] === ACTION) {
                        if(isset($pathGroup[$k][1])) {
                            $this->action = $pathGroup[$k][1];
                            unset($pathGroup[$k]);
                            continue;
                        }
                    }

                }
            }
            // 数组键值重排
            shuffle($pathGroup);
            //dump($pathGroup);
            // Url 多余转成get
            $count = count($pathGroup);
            $foo   = 0;
            while($foo < $count) {
                $_GET[$pathGroup[$foo][0]] = $pathGroup[$foo][1];
                $foo++;
            }
            //dump($_GET);
        }


    }
}