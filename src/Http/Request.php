<?php

namespace Root\Http;

use Error;
use Exception;

class Request
{
    public function method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }
    // request.http
    public function path()
    {
        return explode('?', $_SERVER['REQUEST_URI'])[0] ?? '/';
    }
    public function previouds()
    {
        return $_SERVER['HTTP_REFERER'];
    }
    public static function baseUrl(): string
    {
        return strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]) . '://' .
            $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname($_SERVER['SCRIPT_NAME']));
    }
    // request.query
    public function hasQuery(): bool
    {
        return !empty($_SERVER['QUERY_STRING']);
    }
    private function handlequery(): array
    {
        if ($this->getheader('Content-Type') == 'application/json') {
            $data = fopen('php://input', 'r');
            $str = stream_get_contents($data);
            return json_decode($str, true);
        }
        return $_REQUEST ?? [];
    }
    /**
     * @param string $key 
     * @return string|array
     */
    public  function  getquery(string $key)
    {
        return ($this->handlequery()[$key]) ?? '';
    }
    public  function  all(): array
    {
        return $this->handlequery();
    }
    public function hasFile(): bool
    {
        return !empty($_FILES);
    }
    public function file_detail()
    {
        if ($this->hasFile()) {
            $detail = array();
            foreach ($_FILES as $key => $value) {
                $detail['var_name'] = $key;
                $detail['filename'] = $value['name'];
                $detail['type'] = $value['type'];
                $detail['size'] = $value['size'];
            }
            return $detail;
        }
    }
    // request.auth
    public function user_id()
    {
        return $_SESSION['user_id'] ?? false;
    }
    public function getheader(string $key)
    {
        return apache_request_headers()[$key] ?? '';
    }
}
 
/* request accept content-type : 
   -multipart/form-data
   -application/json

*/
