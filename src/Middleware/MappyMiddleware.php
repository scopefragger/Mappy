<?php
namespace Scopefragger\Mappy\Middleware;

use Closure;
use Scopefragger\Mappy\Services\MappyService;

/**
 * Class MappyMiddleware
 *
 * Middle wear can be utilised to mark routes and groups that should be covered by the
 * site map generator
 *
 * @package Scopefragger\Mappy\Middleware
 */
class MappyMiddleware
{
    /**
     * Runs the middleware rule
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $mappy = new MappyService();
        $mappy->constructUrl();
        return $next($request);
    }
}
