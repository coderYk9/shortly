<?php

namespace App\controller\admin;

use Root\Http\Request;
use App\model\Admins;

/** this class impliment Admins authenticatio */
class AdminAuthController
{


    /**
     *  index function is impliment login view 
     * @return View 
     */
    public function index()
    {
        return view('admin.auth.login', ['title' => 'LOGIN']);
        // return view('auth.login', ['title' => 'LOGIN']);
    }
    public function login(Request $request)
    {
        $user = Admins::query()
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
        $_SESSION['admin_id'] = $user->id;
        return  redirect('/admin/dashboard');
    }
    //add new admin 
    public function store(Request $request)
    {
        try {
            $query = [
                'name' => $request->getquery('name'),
                'username' => $request->getquery('username'),
                'password' => password_hash($request->getquery('password'), PASSWORD_BCRYPT),
            ];
            Admins::query()->create($query);
        } catch (\Throwable $th) {
            $_SESSION['message'] = 'error to regiset with this information';
            $_SESSION['error'] = true;
            return redirect($request->previouds());
        }
        return  redirect('/admin/dashboard');
    }
    public function logout()
    {
        unset($_SESSION['admin_id']);
        return  redirect('/auth/login');
    }
}
