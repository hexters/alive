<?php

namespace Modules\Alive\Providers;

use Hexters\Alive\Middleware\AliveGuestMiddleware;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Modules\Alive\Http\Middleware\LivewireSetupAliveMiddleware;
use Modules\Alive\Http\Middleware\ModuleAliveStatusMiddleware;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {

            Route::group(['middleware' => [
                'web',
                LivewireSetupAliveMiddleware::class,
            ]], function () {

                Route::namespace($this->namespace)
                    ->group(module_path('alive', 'routes/web.php'));

                Route::middleware([AliveGuestMiddleware::class])
                    ->as('alive.')
                    ->prefix(config('alive.prefix'))
                    ->namespace($this->namespace)
                    ->group(module_path('alive', 'routes/auth.php'));
            });
        });
    }
}
