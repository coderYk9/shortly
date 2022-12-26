<?php

namespace Root\Http\jsonResponse;

class JsonResponse
{
    /**
    @param int $response_code 
    @param mixid $content
    @return  json  handle and  return JsonResponse . 
     */
    public static function jsoneResponse($content, int $response_code = 200)
    {
        header('Content-Type:application/json; charset=UTF-8', true, $response_code);
        echo json_encode($content, JSON_THROW_ON_ERROR);
        exit;
    }
    public static function throwJsonError(int $response_code = 400, $msg)
    {
        self::jsoneResponse(['error' => [
            'status' => $response_code,
            'message' => $msg,
        ]], $response_code);
    }
}
