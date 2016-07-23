<?php

namespace Light\Tests\Support;

use Light\Tests\Fixture\StaticCallableFixture;

class StaticCallableTest extends \PHPUnit_Framework_TestCase
{
    public function testStaticCallable()
    {
        $res = StaticCallableFixture::productNumber();

        $this->assertTrue(is_numeric($res));
    }
}
