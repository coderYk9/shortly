<?php

namespace App\controller;

use Root\Http\Request;
use App\model\User;

/** this class impliment user authenticatio */
class AuthController
{


    /**
     *  index function is impliment login view 
     * @return View 
     */
    public function index()
    {
        return view('auth.login', ['title' => 'LOGIN']);
    }
    public function login(Request $request)
    {
        $user = User::query()
            ->where('username', '=', $request->getquery('username'))
            ->first();

        if (!$user) {
            $_SESSION['message'] = 'the user is not found';
            $_SESSION['old'] = $request->all();
            $_SESSION['error'] = true;
            return redirect($request->previouds());
        } elseif (!password_verify($request->getquery('password'), $user->password)) {
            $_SESSION['message'] = 'the password is not valid';
            $_SESSION['error'] = true;
            return redirect($request->previouds());
        }
        $_SESSION['user_id'] = $user->id;
        return  redirect('/admin/dashboard');
    }
    public function store(Request $request)
    {
        try {
            $query = [
                'name' => $request->getquery('name'),
                'username' => $request->getquery('username'),
                'password' => password_hash($request->getquery('password'), PASSWORD_BCRYPT),
            ];
            User::query()->create($query);
        } catch (\Throwable $th) {
            $_SESSION['message'] = 'error to regiset with this information';
            $_SESSION['error'] = true;
            return redirect($request->previouds());
        }
        return  redirect('/auth/login');
    }
    public function register(Request $request)
    {
        return view('auth.register', ['title' => 'REGISTER']);
    }
}
/*
"HTTP_HOST": "localhost:8021",
 "PATH_INFO": "/php8/date_projet/public/",
"SERVER_NAME": "localhost",
 "REQUEST_URI": "/php8/date_projet/public/",

PATH_INFO=REQUEST_URI
*/
