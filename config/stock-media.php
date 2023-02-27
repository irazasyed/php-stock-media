<?php

return [
    'default' => \Irazasyed\StockMedia\Services\Pexels::class,

    'services' => [
        \Irazasyed\StockMedia\Services\Pexels::class => env( 'PEXELS_API_KEY' ),
        \Irazasyed\StockMedia\Services\Pixabay::class => env( 'PIXABAY_API_KEY' ),
        \Irazasyed\StockMedia\Services\Unsplash::class => env( 'UNSPLASH_API_KEY' ),
    ],
];
