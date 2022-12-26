<?php

namespace App\middleware;

use App\model\Admin;
use Root\middleware\MiddlewareInterface;
use Root\Http\Request;

class FirstMiddleware implements MiddlewareInterface
{
    /**  
     *@param callable $next
     *@param Root\Http\Request $request
     *@return $next request if condition is true or block request.
    
     */
    public function __invoke(callable $next, Request $request)
    {
        // if ($request->user_id()) {

        //     if (Admin::getByPK($request->user_id())) {
        //         return redirect('dashboard');
        //     }
        // }
        return $next($request);
    }
}
