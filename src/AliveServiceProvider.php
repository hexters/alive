<?php

namespace Hexters\Alive;

use Illuminate\Support\ServiceProvider;

class AliveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Publish module
         */
        $this->publishes([
            __DIR__ . '/../stubs/Alive' => base_path('Modules/Alive'),
        ], 'alive');
    }
}
