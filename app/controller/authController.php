<?php

namespace App\controller;

use Root\Http\Request;
use App\model\User;

class AuthController
{



    public function index(Request $request)
    {
        // dd(Admin::getByPK('1')->username);
        return view('admin.login', ['title' => 'LOGIN']);
    }
    public function login(Request $request)
    {
        $user = User::query()
            ->where('username', '=', $request->getquery('username'))
            ->first();
        //$2y$10$YOUciHnRFKNli40u/i8CI.NPinX5b4H2qLih./THy0wHNqhdw04Ee
        // dd();
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
    public function register(Request $request)
    {
        return view('admin.register', ['title' => 'REGISTER']);
    }
}
/*
"HTTP_HOST": "localhost:8021",
 "PATH_INFO": "/php8/date_projet/public/",
"SERVER_NAME": "localhost",
 "REQUEST_URI": "/php8/date_projet/public/",

PATH_INFO=REQUEST_URI
*/
