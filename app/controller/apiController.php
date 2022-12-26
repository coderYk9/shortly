<?php

namespace App\controller;

use Root\Http\jsonResponse\JsonResponse;
use Root\Http\Request;


class Apicontroller
{
    public function index(Request $request, array $prams)
    {

        // JsonResponse::jsoneResponse($request->getquery('names'), 201);
        return ['oussama' => "yes its work you are lose"];
    }
}
