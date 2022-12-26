<?php

namespace Root\Http;

use Root\Http\jsonResponse\JsonResponse;
use Root\middleware\StackMiddleware;

class Response
{

    private StackMiddleware $middleware;
    public function __construct()
    {
        $this->middleware = new StackMiddleware();
    }
    /**
     *@param $action
     *@param Request $request
     *@param array $params
     */
    /* number 1 is middle =ware and 2 is action */

    public function handle($action, Request $request, array $params)
    {
        $action[0] ?? $action[0] = false;
        if (!$action[0]) {
            echo viewError('404');
            exit;
        }
        if (count($action) == 2) {

            $request = $this->excuteMiddle($action[1], $request);
        }
        $this->render($action[0], $request, $params);
    }

    private function excuteMiddle($middles, Request $request)
    {
        foreach ($middles as $middle) {
            $this->middleware->add($middle);
        }
        $request = $this->middleware->handle($request);
        return $request;
    }
    private function render($action, Request $request, array $params)
    {
        if (is_array($action)) {
            $res = call_user_func_array([
                new $action[0],
                $action[1]
            ], [$request, $params]);
            if (is_array($res)) {
                JsonResponse::jsoneResponse($res);
            } else {

                echo $res;
                exit;
            }
        } elseif (is_callable($action)) {

            echo call_user_func($action, [$request, $params]);
            exit;
        }
    }
}
