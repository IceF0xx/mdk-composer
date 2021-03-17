<?php


use PHPUnit\Framework\TestCase;
use mihajlov\MyLog;

class MyLogTest extends TestCase
{
    function testGoodLog() {
        $this->expectOutputString("Test\nOutput\n");
        MyLog::log("Test");
        MyLog::log("Output");

        MyLog::write();
    }
}
