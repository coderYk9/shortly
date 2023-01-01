<?php

namespace App\middleware;

use Root\middleware\MiddlewareInterface;
use Root\Http\Request;
use App\model\User;

class GuestUsermiddileware implements MiddlewareInterface
{
    public function __invoke($next, Request $request)
    {
        if ($request->user_id()) {

            if (User::query()->find($request->user_id())) {
                return redirect('/');
            }
            unset($_SESSION['user_id']);
        }
        return $next($request);
    }
}
