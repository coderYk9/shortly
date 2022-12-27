<?php

namespace App\controller;

use App\model\Links;
use App\model\User;
use Root\Http\Request;


/** this class impliment user authenticatio */
class LinkController
{


    /**
     *  index function is impliment login view 
     * @return View 
     */
    // public function index()
    // {
    //     return view('web.home.index', ['title' => 'HOME']);
    // }
    // //add links
    // public function add()
    // {
    //     return view('web.home.index', ['title' => 'HOME']);
    // }
    //store links
    public function store()
    {
        $links = Links::all();
        foreach ($links as $link) {
            if ($link->user_id != null) {
                $link->user_id = User::query()->find($link->user_id);
            }
        }
        return view('admin.links.index', ['title' => 'my-LInks', 'links' => $links]);
    }
    //delete link
    public function delete(Request $req, $params)
    {
        try {
            $link = Links::query()->find($params['id']);
        } catch (\Throwable $th) {
            $_SESSION['message'] = 'Sorry this is Bad query';
            return redirect($req->previouds());
        }
        if ($link) {
            $link->delete();
            $_SESSION['msg'] = 'The links delete successfully';
            return redirect('/admin/links');
        } else {
            $_SESSION['message'] = 'The links Not Found';
            return redirect($req->previouds());
        }
    }
    // // to edite link
    // public function edite()
    // {
    //     return view('web.home.index', ['title' => 'HOME']);
    // }
}
