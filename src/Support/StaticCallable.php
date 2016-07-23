<?php

/*
 * This file is part of the light/traits.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Light\Traits\Support;

use Light\Traits\DesignPattern\Singleton;

trait StaticCallable
{
    use Singleton;
    /**
     * Handle dynamic static method calls into the method.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $instance = static::getInstance();

        return call_user_func_array([$instance, $method], $parameters);
    }
}
