<?php

namespace Irazasyed\StockMedia\Laravel;

use Illuminate\Support\ServiceProvider;
use Irazasyed\StockMedia\StockMedia;
use Irazasyed\StockMedia\StockMediaFactory;

class StockMediaServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     */
    public function boot() {
        $this->publishes( [
            __DIR__ . '/../../config/stock-media.php' => config_path( 'stock-media.php' ),
        ], 'php-stock-media-config' );
    }

    /**
     * Register the application services.
     */
    public function register() {
        $this->mergeConfigFrom( __DIR__ . '/../../config/stock-media.php', 'stock-media' );

        $this->app->singleton( StockMedia::class, function ( $app ) {
            $default = $app['config']['stock-media']['default'];

            $stockMedia = new StockMedia();
            $stockMedia->setDefault( $default );

            $stockMedia
                ->factory()
                ->addServices( array_keys( $app['config']['stock-media']['services'] ) );

            $stockMedia->service()->setApiKey( $app['config']['stock-media']['services'][ $default ] );

            return $stockMedia;
        } );

        $this->app->alias( StockMedia::class, 'stock-media' );
    }
}
