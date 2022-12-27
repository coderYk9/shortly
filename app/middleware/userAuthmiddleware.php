<?php

namespace App\middleware;

use Root\middleware\MiddlewareInterface;
use Root\Http\Request;
use App\model\User;

class UserAuthmiddleware implements MiddlewareInterface
{
    public function __invoke($next, Request $request)
    {
        if (!$_SESSION['user_id']) {
            return redirect('/login');
        } else if (!(User::query()->find($_SESSION['admin_id']))) {
            unset($_SESSION['user_id']);
            return redirect('/login');
        }
        return $next($request);
    }
}
