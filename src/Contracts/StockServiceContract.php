<?php

namespace Irazasyed\StockMedia\Contracts;

interface StockServiceContract
{
    public function search(array $params): array;
}
