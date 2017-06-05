<?php

namespace scopefragger\mappy\Middleware;


use Closure;
use scopefragger\mappy\Controllers\AppController;

class MappyMiddleware
{
    public function handle($request, Closure $next)
    {
        $mappy = new AppController();
        $mappy->index();
        return $next($request);
    }
}
