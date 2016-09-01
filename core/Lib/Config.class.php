<?php
/**
 * 核心配置类.
 * User: wanghui
 * Date: 16/8/28
 * Time: 23:29
 */
namespace core\Lib;
class Config
{
    static public $conf = array();
    static public $confArr = array();


    /**
     * REBELPHP Load Config Files
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    static public function getMyConfig($name)
    {
        /**
         * 1.首先加载应用配置文件 app->Config->config.php
         * 2.找不到再加载 core->Conf->convention.php
         * 3.判断配置是否存在
         * 4.缓存配置
         */
        if(isset(self::$conf[$name])) {
            return self::$conf[$name];
        }else {
            $fileCondition = array('config');
            foreach($fileCondition as $configFile) {
                $file = APP_NAME.'/Config/'.$configFile.'.php';
                if(is_file($file)) {
                    $conf = include $file;
                    // 是否存在该配置项
                    if(isset($conf[$name])) {
                        // 缓存配置
                        self::$conf[$name] = $conf[$name];
                        return $conf[$name];
                    }
                }
                $temp = self::loadSystemConfig($name);
                return $temp;
            }
        }

    }

    // 加载系统默认配置文件
    static private function loadSystemConfig($name) {
        // 加载系统默认配置文件
        $file = REBELPHP.'/core/Conf/convention.php';
        $conf = include $file;
        if(isset($conf[$name])) {
            // 缓存配置
            self::$conf[$name] = $conf[$name];
            return $conf[$name];
        }else {
            throw new \Exception('未找到对应的配置项,'.$name);
        }
    }

    // 加载配置文件中的所有配置项
    static public function all($file) {

        if(isset(self::$confArr[$file])) {
            return self::$confArr[$file];
        }else {
            $filePath = APP_NAME.'/Config/'.$file.'.php';
            if(is_file($filePath)) {
                $confArr = include $filePath;
                // 是否存在该配置项
                if(isset($confArr)) {
                    // 缓存配置
                    self::$confArr[$file] = $confArr;
                    return $confArr;
                }
            }else {
                $filePath = REBELPHP.'/core/Conf/convention.php';
                $confArr = include $filePath;

                self::$confArr['default'] = $confArr;
                return $confArr;
            }

        }
    }
}