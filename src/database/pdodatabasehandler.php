<?php

namespace Root\database;

class PDODatabaseHandler extends DatabaseHandler
{
    private static $_instance;
    private static $_handler;

    function __construct()
    {
        self::init();
    }
    public function __call($name, $arguments)
    {
        return call_user_func_array(array(&self::$_handler, $name), $arguments);
    }

    protected static function init()
    {

        try {
            self::$_handler = new \PDO('mysql://hostname=' . env('DATABASE_HOST') . ';dbname=' .
                env('DATABASE_NAME'), env('DATABASE_USER_N'), env('DATABASE_USER_P'), array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
            ));
        } catch (\PDOException $e) {
            echo 'Sory your may not have access to the database server.' . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance  = new self();
        }
        return self::$_instance;
    }
}
