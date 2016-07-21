<?php

/*
 * This file is part of the light/traits.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Light\Traits\DesignPattern;

/**
 * This implements get instance design pattern.
 */
trait Instance
{
    /**
     * @return static
     */
    final public static function getInstance()
    {
        return new static();
    }
}
