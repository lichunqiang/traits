<?php

namespace Light\Tests\Fixture;

use Light\Traits\Support\StaticCallable;

class StaticCallableFixture
{
    use StaticCallable;

    public function productNumbers()
    {
        return mt_rand(0, 10);
    }
}
