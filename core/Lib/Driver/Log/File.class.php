<?php

/**
 * 文件日志.
 * User: wanghui
 * Date: 16/8/30
 * Time: 21:08
 */
namespace core\Lib\Driver\Log;
class File
{
    # 日志存储位置
    private $logPath;

    function __construct()
    {
        $this->logPath = REBELPHP.'/'.C('LOG_PATH').'/';
    }

    public function log($message)
    {
        if(!is_dir($this->logPath)) {
            mkdir($this->logPath, '0777', true);
        }
//        dump($message);
        $message = date("Y-m-d H:i:s").'---------'.$message;
        $file = 'log';
        file_put_contents($this->logPath.date("YmdH").$file.'.'.C('POSTFIX_LOG'), json_encode($message).PHP_EOL, FILE_APPEND);
    }
}