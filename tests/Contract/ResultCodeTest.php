<?php

namespace HyperfTest\Contract;

use Hewo\Common\Enum\ResultCode;
use Hyperf\Utils\Str;
use PHPUnit\Framework\TestCase;

class ResultCodeTest extends TestCase
{
    public function testInstance()
    {
        $instance = ResultCode::success();
        $this->assertTrue($instance instanceof ResultCode);
    }

    public function testValue()
    {
        $instance = ResultCode::success();
        $value = $instance->value();
        $this->assertTrue($value === 1);
    }

    public function testNotDefineConst()
    {
        $instance = null;
        $constName = "notDefine";
        try {
            $instance = ResultCode::$constName();
        } catch (\Throwable $throwable) {
        }

        $this->assertTrue(is_null($instance));
    }
}
