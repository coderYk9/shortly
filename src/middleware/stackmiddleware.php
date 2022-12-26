<?php



namespace Root\middleware;

use Root\Http\Request;

class StackMiddleware
{

    protected  $start;
    public function __construct()
    {
        $this->start = function (Request $request) {
            return $request;
        };
    }
    public function add(MiddlewareInterface $middleware)
    {
        $next = $this->start;
        $this->start = function (Request $request) use ($middleware, $next) {
            return $middleware($next, $request);
        };
    }
    public function handle(Request $request)
    {
        return call_user_func($this->start, $request);
    }
}
