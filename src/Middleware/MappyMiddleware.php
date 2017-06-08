<?php
namespace Scopefragger\Mappy\Middleware;

use Closure;
use Scopefragger\Mappy\Controllers\AppController;

class MappyMiddleware
{
    public function handle($request, Closure $next)
    {
        $mappy = new AppController();
        $mappy->constructUrl();
        return $next($request);
    }
}
