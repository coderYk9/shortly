<?php

namespace Root;


use Root\Http\Request;
use Root\Http\Response;
use Root\Http\Route;
use Illuminate\Database\Capsule\Manager;
use Dotenv\Dotenv;
use Root\middleware\MiddlewareInterface;
use Root\middleware\StackMiddleware;

class BootStartup
{
    public Request $request;
    private Response $response;
    private  Route $route;
    private string $lang;
    private StackMiddleware $middleware;

    protected   array $db = [
        'driver' => 'mysql',
        'port' => '3306',
        'host' => 'localhost',
        'database' => 'college',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''
    ];
    /**
     * @param Request $requset
     * @param Response $response
     * @param \Root\Http\Route $route
     */
    public function __construct()
    {
        require_once APP_PATH . "route/web.php";
        Dotenv::createImmutable(APP_PATH)->load();

        $this->request = new Request();
        $this->middleware = new StackMiddleware();
        $this->addStackAuth();
        $this->request = $this->middleware->handle($this->request);
        $this->response = new Response();

        $this->route = new Route($this->request, $this->response);

        if (isset($_COOKIE['lang'])) {
            $lang = $_COOKIE['lang'];
            if ($lang == 'ar' or $lang == 'en') {
                $this->lang = $lang;
            }
        } else {
            $this->lang = env('default_lang', 'en');
        }
    }

    public function run()
    {
        $this->db_connect();
        $this->route->resolve();
    }
    public  function db_connect()
    {
        $capsule = new Manager;
        $capsule->addConnection($this->db);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
    public function setLocal(string $lang)
    {
        $this->lang = $lang;
    }
    public function getLocal(): string
    {
        return $this->lang;
    }
    protected function addStackAuth()
    {
        $configmd = require APP_PATH . 'config/auth.php';

        foreach ($configmd['routegroupe'] as $md) {

            $this->middleware->add($md);
        }
    }
}
