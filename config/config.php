<?php

return [

    require_once APP_PATH . 'vendor/autoload.php',
    require_once APP_PATH . 'src/Support/base_function.php',
    define('APP_CONF', APP_PATH . 'config'),
    define('APP_LANG', APP_PATH . 'lang'),
    ini_set('display_errors', 1),
    ini_set('display_startup_errors', 1),
    ini_set('html_errors', 1),


];
