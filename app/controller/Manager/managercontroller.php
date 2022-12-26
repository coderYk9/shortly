<?php

namespace App\controller\Manager;

class ManagerController
{
    public function languageSet($lang)
    {
        app()->setLocal($lang);
        setcookie('lang',$lang);
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
