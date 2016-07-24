<?php

namespace Light\Tests\Support;

use Light\Tests\Fixture\ClassFixture;

class StaticCallableTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        ClassFixture::macro('num', function() {
            return 2;
        });
    }

    public function testStaticMacro()
    {
        $this->assertEquals(2, ClassFixture::num());
    }

    public function testObjectMacro()
    {
        $obj = new ClassFixture();
        $this->assertEquals(2, $obj->num());
    }
}
