<?php


use Root\BootStartup;
use Root\Support\LanguageRender;
use Root\View\Template;

if (!function_exists('env')) {
    function env(string $key, $default = null): string
    {
        return $_ENV[$key] ?? $default;
    }
}
if (!function_exists('config')) {
    function config(string $key, $default = null)
    {
        return $_ENV[$key] ?? $default;
    }
}
if (!function_exists('value')) {
    function value($value)
    {
        return ($value instanceof Closure) ? $value() : $value;
    }
}
if (!function_exists('view')) {
    function view(string $view, $data)
    {
        return \Root\View\ViewHandler::make($view, $data);
    }
}
if (!function_exists('viewError')) {
    function viewError(string $type)
    {
        return \Root\View\ViewHandler::makeError($type);
    }
}
if (!function_exists('app')) {
    function app()
    {
        static $instance = null;
        if (!$instance) {
            $instance = new BootStartup();
            return $instance;
        }
        return $instance;
    }
}
if (!function_exists('redirect')) {
    function redirect($path)
    {
        session_write_close();
        header('location:' . $path);
        exit();
    }
}
if (!function_exists('trans')) {
    function trans(string $path, string $key): string
    {
        static $pa;
        static $instance;
        if ($pa == $path) {
            // var_dump(100);
            return $instance[$key] ?? $key;
        } else {
            $pa = $path;
            $instance = LanguageRender::loadLang(app()->getLocal(), $path);
            // var_dump(21);
            return $instance[$key] ?? $key;
        }
    }
}

if (!function_exists('extend')) {
    function extend($layout)
    {
        return Template::extend($layout);
    }
}
if (!function_exists('asset')) {
    function asset($resource)
    {
        return Template::asset($resource);
    }
}
