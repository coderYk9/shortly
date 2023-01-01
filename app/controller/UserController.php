<?php

namespace App\controller;

use App\model\Links;
use Root\Http\Request;
use App\model\User;

/** this class impliment user authenticatio */
class UserController
{


    /**
     *  index function is impliment login view 
     * @return View 
     */
    public function index()
    {

        return view('web.home.index', ['title' => 'HOME']);
    }
    //add links
    public function add()
    {
        return view('web.home.index', ['title' => 'HOME']);
    }
    //store links
    public function store()
    {
        $links = Links::all();
        return view('web.links.index', ['title' => 'my-LInks', 'links' => $links]);
    }
}
