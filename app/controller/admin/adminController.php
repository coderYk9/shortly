<?php

namespace App\controller\admin;

use Root\Http\Request;
use App\model\Admins;


class AdminController
{

    public function index()
    {

        try {
            $user = Admins::all();
            return view('admin.activite.index', ['title' => 'Membres', 'admins' => $user]);
        } catch (\Throwable $th) {
            return  viewError(404);
        }
    }
    public function store()
    {

        return view('admin.activite.create', ['title' => 'Create']);
    }
    public function edite($req, $params)
    {
        try {
            $link = Admins::query()->find($params['id']);
        } catch (\Throwable $th) {
            $_SESSION['message'] = 'Sorry this is Bad query';
            return redirect($req->previouds());
        }
        if ($link) {

            return view('admin.activite.edit', ['title' => 'EDITE', 'admin' => $link]);
        } else {
            $_SESSION['message'] = 'The Admin Not Found';
            return redirect($req->previouds());
        }
    }
    public function update(Request $req, $params)
    {
        try {
            $link = Admins::query()->find($params['id']);
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
            $_SESSION['msg'] = 'The Admin Update successfully';
            return redirect('/admin/dashboard');
        } else {
            $_SESSION['message'] = 'The Admin Not Found';
            return redirect($req->previouds());
        }
    }
    public function delete($req, $params)
    {
        try {
            $link = Admins::query()->find($params['id']);
        } catch (\Throwable $th) {
            $_SESSION['message'] = 'Sorry this is Bad query';
            return redirect($req->previouds());
        }
        if ($link) {
            $link->delete();
            $_SESSION['msg'] = 'The Admin delete successfully';
            return redirect('/admin/dashboard');
        } else {
            $_SESSION['message'] = 'The User Not Found';
            return redirect($req->previouds());
        }
    }
}
