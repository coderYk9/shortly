<?php

namespace Root\database;
use Illuminate\Database\Capsule\Manager;

class Migration {

	 protected static  array $db = [
        'driver' => 'mysql',
        'port' => '3306',
        'host' => 'localhost',
        'database' => 'college',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => ''
    ];
    public static function db_connect()
    {
        $capsule = new Manager;
        $capsule->addConnection(static::$db);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
    // public static function db_connect()
    // {
    //     $capsule = new Manager;
    //     $capsule->addConnection(static::$db);
    //     $capsule->setAsGlobal();
    //     $capsule->bootEloquent();
    // }
}