<?php

namespace App\controller\admin;

use App\model\Employee;
use Root\Http\Request;
use App\model\User;


class AdminController
{

    public function index(Request $request, array $prams)
    {

        return view('admin.dashboard', ['title' => 'dashborad frome adminconttroller']);
    }
}
