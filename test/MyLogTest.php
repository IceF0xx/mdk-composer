<?php


use PHPUnit\Framework\TestCase;
use mihajlov\MyLog;

class MyLogTest extends TestCase
{
    function testGoodLog() {
        $this->expectOutputString("Test Output\n");
        MyLog::log("Test Output");
        MyLog::write();
    }
}
