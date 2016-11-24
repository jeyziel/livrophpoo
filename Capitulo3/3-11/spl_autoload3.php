<?php

$al = new ApplicationLoader;
$al->register();
$nome = new jeyziel;
$nome->getNome();



class ApplicationLoader
{
    public function register()
    {
        spl_autoload_register(array($this,'loadClass'));
    }

    public function loadClass($class)
    {
        if(file_exists("Lib/{$class}.php"))
        {
            require_once "Lib/{$class}.php";
            return true;
        }
        return false;
    }
}