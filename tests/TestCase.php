<?php

namespace Irazasyed\StockMedia\Tests;

use Irazasyed\StockMedia\Laravel\StockMediaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            StockMediaServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
