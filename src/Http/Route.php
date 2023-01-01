<?php

namespace Root\Http;


class Route
{
    public Request $request;
    public Response $response;
    private static $prefix = '';
    private static $middlewares = array();
    private static array $prams = array();

    protected static array $route = array();
    protected static array $routes = array();

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    private function addRoute($methods, $uri, $action)
    {
        $url = trim(static::$prefix . '/' . trim($uri, '/'), '/') . '/';
        $url = $url ?? '/';

        if (!empty(static::$middlewares)) {

            self::$route[$methods][$url] = [0 => $action, 1 => static::$middlewares];

            return 0;
        }
        self::$route[$methods][$url] = [0 => $action];
        return 0;
    }
    public static function middleware(string $namemd, callable $callable): void
    {
        $var1 = explode('|', $namemd);
        $middle = include APP_PATH . 'config/auth.php';
        foreach ($var1 as $value) {
            if (isset($middle['groupe'][$value])) {
                static::$middlewares[] = $middle['groupe'][$value];
            }
        }


        call_user_func($callable);
        static::$middlewares = [];
    }

    public static function get($route, $action)
    {
        self::addRoute('GET', $route, $action);
    }
    public static function post($route, $action)
    {
        self::addRoute('POST', $route, $action);
    }
    public static function delete($route, $action)
    {
        self::addRoute('DELETE', $route, $action);
    }
    public static function put($route, $action)
    {
        self::addRoute('PUT', $route, $action);
    }
    public static function prefix(string $prefix, callable $callable): void
    {

        static::$prefix = trim($prefix, '/');
        call_user_func($callable);
        static::$prefix = '';
    }

    public function resolve()
    {

        $action = $this->handeler();
        // dd(self::$routes);
        $this->response->handle($action, $this->request, self::$prams);
    }
    public function  handeler()
    {
        $method = $this->request->method();
        $path = trim($this->request->path(), '/') . '/';
        foreach (self::$route[$method] as $ro => $value) {
            if (preg_match_all('/\/{(.*?)}/', $ro, $msg)) {
                $po = '@^' . preg_replace(
                    '/\/{(.*?)(:[^}]+)?}/',
                    '/(.*?)',
                    $ro
                ) . '$@';

                preg_match($po, $path, $matche);
                if (!empty($matche)) {
                    self::$routes[$method][$matche[0]] = $value;
                    for ($i = 1; $i < count($matche); $i++) {

                        self::$prams[$msg[1][$i - 1]] = $matche[$i];
                    }
                }
                // dd($matche);
            } else {
                self::$routes[$method][$ro] = $value;
            }
        }
        foreach (self::$prams as $pram) {
            if (strpos($pram, '/')) {
                return  false;
            }
        }

        // dump(self::$prams);

        self::$route = [];
        return self::$routes[$method][$path] ?? false;
    }
}
