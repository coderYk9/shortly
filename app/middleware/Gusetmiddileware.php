<?php

namespace App\middleware;

use Root\middleware\MiddlewareInterface;
use Root\Http\Request;
use App\model\Admins;


class Gusetmiddileware implements MiddlewareInterface
{
    public function __invoke($next, Request $request)
    {
        if (isset($_SESSION['admin_id'])) {

            if (Admins::query()->find($_SESSION['admin_id'])) {
                return redirect('/admin/dashboard');
            }
            unset($_SESSION['admin_id']);
        }
        return $next($request);
    }
}
