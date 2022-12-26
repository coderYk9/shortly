<?php

namespace App\middleware;

use Root\middleware\MiddlewareInterface;
use Root\Http\Request;
use Root\Http\jsonResponse\JsonExceptions;
use App\model\Admin;

class Authmiddleware implements MiddlewareInterface
{
    public function __invoke($next, Request $request)
    {
        if (!$request->user_id()) {
            // dd('id');
            return redirect('/auth/login');
        } else if (!(Admin::getByPK($request->user_id()))) {
            unset($_SESSION['user_id']);
            // dd('admin');
            return redirect('/auth/login');
        }
        return $next($request);
    }
}
