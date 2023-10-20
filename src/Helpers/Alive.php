<?php

namespace Hexters\Alive\Helpers;

use Closure;
use Hexters\Alive\Middleware\AliveAuthMiddleware;
use Hexters\Alive\Middleware\AliveMiddleware;
use Illuminate\Support\Facades\Route;

class Alive
{

    /**
     * Group route for alive modules
     *
     * @param Closure|null $routes
     * @return void
     */
    public function route(Closure $routes): void
    {
        Route::group([
            'middleware' => [AliveMiddleware::class, AliveAuthMiddleware::class],
            'as' => 'alive.',
            'prefix' => config('alive.prefix')
        ], function () use ($routes) {
            $routes();
        });
    }


    public function flash($message, $class = 'success')
    {
        session()->flash('flash-message', [
            'message' => is_array($message) ? $message : [$message],
            'class' => $class
        ]);
    }

    public function menus()
    {
        $menus = [];
        foreach (module_path_lists() as $path) {
            if (file_exists($kernel = "{$path}/Menus/kernel.php")) {
                $classes = require($kernel);
                foreach ($classes as $divider => $class) {

                    if (!is_numeric($divider)) {
                        $menus[] = $this->divider($divider);
                    }

                    if (is_array($class)) {
                        foreach ($class as $cls) {
                            $menus[] = app($cls)->render();
                        }
                    } else {
                        $menus[] = app($class)->render();
                    }
                }
            }
        }

        return $menus;
    }

    protected function divider($label)
    {
        return [
            'type' => 'divider',
            'name' => $label,
        ];
    }

    public function gates()
    {
    }
}
