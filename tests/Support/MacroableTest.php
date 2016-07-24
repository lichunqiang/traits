<?php

/*
 * This file is part of the light/traits.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Light\tests\Support;

use Light\Tests\Fixture\ClassFixture;
use Light\Tests\Fixture\MockObject;

class MacroableTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        ClassFixture::macro('num', function () {
            return 2;
        });

        ClassFixture::macro('name', [MockObject::class, 'name']);
    }

    public function testStaticMacro()
    {
        $this->assertSame(2, ClassFixture::num());
    }

    public function testObjectMacro()
    {
        $obj = new ClassFixture();
        $this->assertSame(2, $obj->num());
        $this->assertSame('mockEcho', $obj->name());
    }

    public function testNoneClosure()
    {
        $this->assertSame('mockEcho', ClassFixture::name());
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testException()
    {
        ClassFixture::undefinedMethod();
    }
}
