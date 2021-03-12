<?php

namespace mihajlov;

use core\LogAbstract as LogAbstract;
use core\LogInterface as LogInterface;


class MyLog extends LogAbstract implements LogInterface
{
    public function _write()
    {
        $unixTime = time();
        $logFile = "logs/$unixTime.log";

        if (!file_exists("logs")) {
            mkdir("logs");
        }

        file_put_contents($logFile, implode("\n", $this->log));

        foreach ($this->log as $log) {
            echo $log . "\n";
        }
    }

    public function _log($str)
    {
        $this->log[] = $str;
    }

    public static function log($str)
    {
        self::Instance()->_log($str);
    }

    public static function write()
    {
        self::Instance()->_write();
    }
}
