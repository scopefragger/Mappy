<?php

namespace scopefragger\mappy\Middleware;


use Closure;
use scopefragger\mappy\Controllers\AppController;

class MappyMiddleware
{
    /**
     * The router instance.
     */
    public function __construct()
    {

    }

    public function handle($request, Closure $next, $guard = null)
    {
        $mappy = new AppController();
        $mappy->index();
        return $next($request);
    }
}
