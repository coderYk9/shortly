<?php

namespace Root\View;

use Exception;

use function PHPUnit\Framework\throwException;

class ViewHandler
{
    private static string $path = APP_PATH . 'View' . DS;
    public static function make(string $view, $data = null)
    {
        //        $okk=['oussama'=>'yesss'];
        return  self::getViewContent($view, $data);
    }
    public static function makeError($type)
    {
        http_response_code($type);
        $view = self::$path . 'error' . DS . $type . '.php';
        if (file_exists($view)) {
            ob_start();
            include $view;
            return ob_get_clean();
        }
        return "Error $type in Server , Srorry try again later .";
    }
    private function CheekPath(string $view)
    {
        $path = str_replace(['/', '\\', '.'], DS, $view) . '.php';
        $path = self::$path . $path;
        if (file_exists($path)) {
            return $path;
        }
        return false;
    }
    protected function getViewContent(string $view, $data)
    {
        $cheek = self::CheekPath($view);
        if ($cheek) {
            extract(...[$data]);
            ob_start();
            include $cheek;
            return ob_get_clean();
        }
        dd("Fatal Error : This ><'$view'>< View is not found");
    }
}
