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
 * This implements the singleton design pattern.
 */
trait Singleton
{
    /**
     * @var static
     */
    protected static $_instance;

    /**
     * Get the instance.
     *
     * @return static
     */
    final public static function getInstance()
    {
        if (null === static::$_instance) {
            static::$_instance = new static();
        }

        return static::$_instance;
    }

    /**
     * Swap the instance to another.
     *
     * @param mixed $instance
     */
    final public static function swap($instance)
    {
        static::$_instance = $instance;
    }

    /**
     * Make __construct private to avoid new the object.
     */
    private function __construct()
    {
    }

    /**
     * Disable clone.
     */
    private function __clone()
    {
    }
}
