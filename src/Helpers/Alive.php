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
        foreach (module_name_lists() as $module) {
            if (class_exists($class = "Modules\\{$module}\\Access\\Kernel")) {
                $defaults = app($class)->default();
                foreach ($defaults as $divider => $class) {

                    if (is_array($class)) {
                        foreach ($class as $i => $cls) {
                            $menus[] = app($cls)->render( $i == 0 ? $divider : null);
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

    public function gates($menus)
    {

        $gates = [];
        foreach ($menus as $menu) {
            if ($menu['type'] == 'menu') {
                $gates[] = $menu['gate'];

                foreach ($menu['permissions'] as $permission) {
                    $gates[] = $permission['gate'];
                }

                if (count($menu['submenu']) > 0) {
                    $gates = [
                        ...$gates,
                        ...$this->gates($menu['submenu'])
                    ];
                }
            }
        }

        return $gates;
    }
}
