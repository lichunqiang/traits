<?php

/*
 * This file is part of the light/traits.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Light\tests\Contract;

use Light\Tests\Fixture\SleepifyFixture;

class SleepifyTest extends \PHPUnit_Framework_TestCase
{
    public function testHold()
    {
        $obj = new SleepifyFixture('light', 1);

        $str = serialize($obj);

        $restoredObj = unserialize($str);

        $this->assertSame($restoredObj->getName(), $obj->getName());
    }
}
