<?php

namespace App\middleware;

use Root\middleware\MiddlewareInterface;
use Root\Http\Request;

use App\model\Admin;

class Gusetmiddileware implements MiddlewareInterface
{
    public function __invoke($next, Request $request)
    {
        if ($request->user_id()) {

            if (Admin::getByPK($request->user_id())) {
                return redirect('/admin/dashboard');
            }
        }
        return $next($request);
    }
}
