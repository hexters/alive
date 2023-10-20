<?php

namespace Modules\Alive\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class LivewireSetupAliveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        Config::set('livewire.view_path', module_path('alive', 'Resources/views/livewire'));
        Config::set('livewire.class_namespace', "Modules\\Alive\\Livewire");
        
        return $next($request);
    }
}
