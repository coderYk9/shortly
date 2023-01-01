<?php

namespace Root\View;

class Template
{

    public static function asset($resource)
    {
        $path = env('APP_DOMAINE', '127.0.0.1:8021');
        echo 'http://' . $path . "/assets/{$resource}";
    }

    public static function extend($layout)
    {
        // $layout=str_replace()
        $file = APP_PATH . 'View' . DS . 'layout' . DS . $layout . '.php';
        if (file_exists($file)) {
            ob_start();
            include $file;
            return ob_get_clean();
        }
        dd('extend');
    }
}
