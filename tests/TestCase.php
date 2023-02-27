<?php

namespace Irazasyed\StockMedia\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Irazasyed\StockMedia\Laravel\StockMediaServiceProvider;

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
