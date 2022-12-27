<?php

namespace App\controller;

use App\model\Links;
use App\model\User;
use Illuminate\Support\Facades\Validator;
use Root\Http\jsonResponse\JsonResponse;
use Root\Http\Request;


/** this class impliment user authenticatio */
class LinkController
{

    public function del(Request $res, $params)
    {
        $links = Links::query()
            ->where('user_id', '=', $res->user_id())
            ->where('id', '=', $params['id'])
            ->first();
        if (empty($links)) {
            $_SESSION['message'] = 'You are not acces to this link ';
            return redirect('/my-links');
        }
        $links->delete();
        $_SESSION['msg'] = 'The links delete successfully';
        return redirect('/my-links');
    }

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
    public function all(Request $res)
    {
        $links = Links::query()
            ->where('user_id', '=', $res->user_id())
            ->get();

        return view('web.links.index', ['title' => 'my-LInks', 'links' => $links]);
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
    public function create(Request $req)
    {
        try {

            $full = $req->getquery('full_url');
            if (empty($full = $req->getquery('full_url'))) {
                return JsonResponse::jsoneResponse(['errors' => ['full_link' => "this url not valide"]]);
            }
            $short = uniqueurl();
            $data = [
                'full_url' => $full,
                'short_url' => $short,
            ];
            if ($req->user_id()) {
                $data['user_id'] = $req->user_id();
            }
            Links::query()->create($data);
        } catch (\Throwable $th) {
            return JsonResponse::jsoneResponse(['errors' => ['full_link' => "this $full not valide"]]);
        }

        $url = $req->baseUrl() . '/' . $short;

        return JsonResponse::jsoneResponse(['url' => $url]);
    }
    public function getlink(Request $req, $params)
    {
        $link = $params['link'];
        $cheek = Links::query()
            ->where('short_url', '=', $link)
            ->first();
        if (!$cheek) {
            return viewError(404);
        }
        $cheek->update(['views' => ++$cheek->views]);
        return redirect($cheek->full_url);
    }
}
