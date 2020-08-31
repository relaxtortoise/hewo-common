<?php

namespace HyperfTest\Enum;

use Hewo\Common\Enum\TestEnum;
use PHPUnit\Framework\TestCase;

class TestEnumTest extends TestCase
{
    public function testInstantiation()
    {
        $instance = TestEnum::test();
        $this->assertTrue($instance instanceof TestEnum);
    }

    public function testGetAnnotationValue()
    {
        $instance = TestEnum::test();
        $message = $instance->message();
        $this->assertEquals("this is test message", $message);
    }

    public function testGetConstValue()
    {
        $instance = TestEnum::test();
        $value = $instance->value();
        $this->assertEquals(0, $value);
    }

}
