<?php

/*
 * This file is part of the light/traits.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Light\tests\DesignPattern;

use Light\Tests\Fixture\MockObject;
use Light\Tests\Fixture\SingletonFixture;

class SingletonTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertTrue(SingletonFixture::getInstance() instanceof SingletonFixture);
    }

    public function testSwap()
    {
        $obj = new MockObject();

        SingletonFixture::swap($obj);

        $this->assertFalse(SingletonFixture::getInstance() instanceof SingletonFixture);
    }

    public function testMultiInstance()
    {
        $obj1 = SingletonFixture::getInstance();
        $obj2 = SingletonFixture::getInstance();

        $this->assertTrue($obj1 === $obj2);
    }
}
