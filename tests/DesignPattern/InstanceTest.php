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

use Light\Tests\Fixture\InstanceFixture;

class InstanceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetInstance()
    {
        $this->assertTrue(InstanceFixture::getInstance() instanceof InstanceFixture);
    }

    public function testMultiInstance()
    {
        $obj1 = InstanceFixture::getInstance();
        $obj2 = InstanceFixture::getInstance();

        $this->assertFalse($obj1 === $obj2);
    }
}
