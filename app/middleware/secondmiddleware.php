<?php

namespace App\middleware;

use Root\middleware\MiddlewareInterface;
use Root\Http\Request;

class SecondMiddleware implements MiddlewareInterface
{
    public function __invoke($next, Request $request)
    {
        // dump($this);
        return $next($request);
    }
}
