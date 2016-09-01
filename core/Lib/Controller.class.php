<?php
/**
 * 自动加载类.
 * User: wanghui
 * Date: 16/8/27
 * Time: 23:33
 */
namespace core\Lib;
use core\Lib\Config;
class Controller{

    // 模板变量
    public $assign = array();

    // 模板赋值
    public function with($key, $value)
    {
        $this->assign[$key] = $value;
    }

    // 模板展示
    public function view($file)
    {
        $route = new \core\Lib\Route();
        $Module =  $route->module;
        $filePath = APP.'/'.$Module.'/View/'.$file.'.blade.php';
        if(is_file($filePath)) {
            // 缓存目录
            $cachePath = REBELPHP.'/runtime/Templates';
            if(!is_dir($cachePath)) {
                // 不存在,则自动创建
                mkdir($cachePath, 0777, true);
            }

            // 引入 TWIG 模板引擎
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/'.$Module.'/View');
            $twig = new \Twig_Environment($loader, array(
                'cache' => $cachePath,
                'debug' => DEBUG
            ));
            $template = $twig->loadTemplate($file.'.blade.php');
//            dump($this->assign);
            $template->display($this->assign ? $this->assign : '');
            // 将所有赋值给模板的数组打散
//            extract($this->assign);
            // 加载文件
//            include $filePath;
        }else {
            throw new \Exception('模板不存在,'.$filePath);
        }
    }

}