<?php

namespace Root\View;

use eftec\bladeone\BladeOne;

class ViewHandler
{
    private static string $path = APP_PATH . 'View' . DS;
    public static function make(string $view, $data = [])
    {
        return  self::getblade($view, $data);
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
        $path = str_replace(['/', '\\', '.'], DS, $view) . '.blade.php';
        $path = self::$path . $path;
        if (file_exists($path)) {
            return true;
        }
        return false;
    }

    protected function getblade(string $view, $data)
    {

        if (self::CheekPath($view)) {
            $balde =  new BladeOne(APP_PATH . 'View', APP_PATH . 'storage', BladeOne::MODE_DEBUG);
            return $balde->run($view, $data);
        }
        dd("Fatal Error : This ><'$view'>< View is not found");
    }
}
