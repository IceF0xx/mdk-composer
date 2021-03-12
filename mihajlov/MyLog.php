<?php

namespace mihajlov;

use core\LogAbstract as LogAbstract;
use core\LogInterface as LogInterface;


class MyLog extends LogAbstract implements LogInterface
{
    public function _write(): void
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

    public function _log(string $str): void
    {
        $this->log[] = $str;
    }

    public static function log(string $str): void
    {
        self::Instance()->_log($str);
    }

    public static function write(): void
    {
        self::Instance()->_write();
    }
}
