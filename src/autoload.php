<?php

spl_autoload_register('autoload');

function autoload($className){
   $path= realpath(dirname(__FILE__))."\..".DIRECTORY_SEPARATOR.$className;
   echo $path;
}
