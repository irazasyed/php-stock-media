<?php

namespace Irazasyed\StockMedia\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Irazasyed\StockMedia\StockMedia
 */
class StockMedia extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Irazasyed\StockMedia\StockMedia::class;
    }
}
