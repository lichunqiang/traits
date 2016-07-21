<?php

/*
 * This file is part of the light/traits.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Light\Traits\Contract;

use ReflectionClass;

trait Sleepify
{
    /**
     * Magic method of sleep.
     */
    public function __sleep()
    {
        $properties = (new ReflectionClass($this))->getProperties();

        return array_map(function ($property) {
            return $property->getName();
        }, $properties);
    }
    /**
     * Magic method of wake up.
     */
    public function __wakeup()
    {
        $properties = (new ReflectionClass($this))->getProperties();
        foreach ($properties as $property) {
            $property->setValue(
                $this,
                $this->getPropertyValue($property)
            );
        }
    }

    /**
     * Get the property value for the given property.
     *
     * @param \ReflectionProperty $property
     *
     * @return mixed
     */
    protected function getPropertyValue(\ReflectionProperty $property)
    {
        $property->setAccessible(true);

        return $property->getValue($this);
    }
}
