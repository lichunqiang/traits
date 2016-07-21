<?php

namespace Light\Traits\DesignPattern;

/**
 * This implements the singleton design pattern.
 */
trait Singleton
{
    /**
     * @var static
     */
    private static $_instance;

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
     * @param static $instance
     */
    final public static function swap($instance)
    {
        static::$_instance = $instance;
    }
}

