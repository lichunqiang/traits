<?php

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
