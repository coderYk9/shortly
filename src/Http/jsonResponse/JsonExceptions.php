<?php

namespace Root\Http\jsonResponse;

define('REQUSET_METHOD_NOT_VALID', 100);
class JsonExceptions

{

    // const BAD_REQUSET = 400;
    // const NOT_FOUND = 404;

    public static function throwMessage(int $response_code)
    {

        switch ($response_code) {
            case 100:
                self::handler(100, 'this request method not valid');
                break;
            case 400:
                self::handler(400, 'this is bad request ');
                break;
            case 404:
                self::handler(404, 'this request not found');
                break;
            case 403:
                self::handler(403, 'You are not authorazid');
                break;
        }
    }
    public static function handler(int $response_code, string $msg)
    {
        JsonResponse::jsoneResponse(['error' => [
            'status' => $response_code,
            'message' => $msg,
        ]], $response_code);
    }
}
