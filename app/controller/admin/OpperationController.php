<?php

namespace App\controller\admin;


use App\model\User;
use Root\Http\Request;

/** this class all opperation admin */
class OpperationController
{


    /**
     *  full opperation to user
     * @return View 
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['title' => 'users', 'users' => $users]);
    }
    public function edite($req, $params)
    {
        try {
            $link = User::query()->find($params['id']);
        } catch (\Throwable $th) {
            $_SESSION['message'] = 'Sorry this is Bad query';
            return redirect($req->previouds());
        }
        if ($link) {

            return view('admin.users.edit', ['title' => 'EDITE', 'user' => $link]);
        } else {
            $_SESSION['message'] = 'The User Not Found';
            return redirect($req->previouds());
        }
    }
    public function update(Request $req, $params)
    {
        try {
            $link = User::query()->find($params['id']);
        } catch (\Throwable $th) {
            $_SESSION['message'] = 'Sorry this is Bad query';
            return redirect($req->previouds());
        }
        if ($link) {
            if (!empty($req->getquery('password'))) {
                $link->update([
                    'name' => $req->getquery('name'),
                    'username' => $req->getquery('username'),
                    'password' => password_hash($req->getquery('password'), PASSWORD_BCRYPT),
                ]);
            } else {
                $link->update([
                    'name' => $req->getquery('name'), 'username' => $req->getquery('username'),
                ]);
            }
            $_SESSION['msg'] = 'The User Update successfully';
            return redirect('/admin/users');
        } else {
            $_SESSION['message'] = 'The User Not Found';
            return redirect($req->previouds());
        }
    }
    public function delete($req, $params)
    {
        try {
            $link = User::query()->find($params['id']);
        } catch (\Throwable $th) {
            $_SESSION['message'] = 'Sorry this is Bad query';
            return redirect($req->previouds());
        }
        if ($link) {
            $link->delete();
            $_SESSION['msg'] = 'The User delete successfully';
            return redirect('/admin/users');
        } else {
            $_SESSION['message'] = 'The User Not Found';
            return redirect($req->previouds());
        }
    }
}
