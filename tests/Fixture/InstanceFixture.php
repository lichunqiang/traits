<?php

/*
 * This file is part of the light/traits.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Light\Tests\Fixture;

use Light\Traits\DesignPattern\Instance;

class InstanceFixture
{
    use Instance;

    public function test()
    {
        return mt_rand(0, 100);
    }
}
