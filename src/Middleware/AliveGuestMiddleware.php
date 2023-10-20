<?php

namespace Hexters\Alive\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class AliveGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->guard('alive')->check()) {
            return to_route('alive.welcome');
        }

        Config::set('livewire.layout', 'alive::components.layouts.guest');
        return $next($request);
    }
}
