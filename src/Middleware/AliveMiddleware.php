<?php

namespace Hexters\Alive\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class AliveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        Auth::shouldUse('alive');
        Config::set('livewire.layout', 'alive::components.layouts.auth');

        $this->domainValidation($request);

        return $next($request);
    }

    /**
     * Not allowed to access in subdomain
     */
    public function domainValidation(Request $request)
    {
        $domain = Str::of(config('app.url'))->replace(['https://', 'http://'], '')->rtrim('/');
        if (!in_array($request->getHost(), [$domain, "www.{$domain}"])) {
            abort(404);
        }
    }
}
