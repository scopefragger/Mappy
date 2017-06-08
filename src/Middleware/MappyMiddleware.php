<?php
namespace Scopefragger\Mappy\Middleware;

use Closure;
use Scopefragger\Mappy\Services\MappyService;

class MappyMiddleware
{
    public function handle($request, Closure $next)
    {
        $mappy = new MappyService();
        $mappy->constructUrl();
        return $next($request);
    }
}
