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
}
