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

use BadMethodCallException;
use Closure;

trait Macroable
{
    /**
     * The registered string  macros.
     *
     * @var array
     */
    protected static $macros = [];

    /**
     * Register a custom macro.
     *
     * @param string   $name
     * @param callable $macro
     */
    public static function macro($name, callable $macro)
    {
        static::$macros[$name] = $macro;
    }

    /**
     * Check if macro is registered.
     *
     * @param string $name
     *
     * @return bool
     */
    public static function hasMacro($name)
    {
        return isset(static::$macros[$name]);
    }

    /**
     * Dynamically handle calls to the class.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public static function __callStatic($method, $arguments)
    {
        if (!static::hasMacro($method)) {
            throw new BadMethodCallException("Method {$method} does not exists.");
        }

        if (static::$macros[$method] instanceof Closure) {
            //http://php.net/manual/en/closure.bind.php
            return call_user_func_array(Closure::bind(static::$macros[$method], null, static::class), $arguments);
        }

        return call_user_func_array(static::$macros[$method], $arguments);
    }

    /**
     * Dynamically  handle calls to the class.
     *
     * @param $name
     * @param $arguments
     *
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (!static::hasMacro($name)) {
            throw new BadMethodCallException("Method {$name} does not exists.");
        }

        if (static::$macros[$name] instanceof Closure) {
            //http://php.net/manual/en/closure.bind.php
            return call_user_func_array(static::$macros[$name]->bindTo($this, static::class), $arguments);
        }

        return call_user_func_array(static::$macros[$name], $arguments);
    }
}
