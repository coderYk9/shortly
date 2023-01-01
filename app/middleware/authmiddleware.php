<?php

namespace App\middleware;

use Root\middleware\MiddlewareInterface;
use Root\Http\Request;
use App\model\Admins;

class Authmiddleware implements MiddlewareInterface
{
    public function __invoke($next, Request $request)
    {
        if (!$_SESSION['admin_id']) {
            // dd('id');
            return redirect('/auth/login');
        } else if (!(Admins::query()->find($_SESSION['admin_id']))) {
            unset($_SESSION['admin_id']);
            // dd('admin');
            return redirect('/auth/login');
        }
        return $next($request);
    }
}
