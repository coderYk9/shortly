<?php

define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', realpath(dirname(__FILE__)) . DS . '..' . DS);
require_once APP_PATH . 'config/config.php';
session_start();


app()->run();
