<?php

namespace Root\Support;

class LanguageRender
{
    private function __construct()
    {
    }
    private function __clone(){}
    public static function loadLang(string $lang,string $value):array{
        $path=include_once APP_LANG.DS.$lang.DS.$value.'.php';
        if (isset($path)){
            return $path;
        }
       return [];
    }

}
