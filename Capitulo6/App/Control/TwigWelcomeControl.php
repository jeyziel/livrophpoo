<?php

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 02/01/2017
 * Time: 14:07
 */

use Livro\Control\Page;


class TwigWelcomeControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        require_once 'Lib\Twig\Autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('App/Resources');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('welcome.html');

        $replaces = array();
        $replaces['nome'] = 'jeyziel';
        $replaces['rua'] = 'Rua m';
        $replaces['cep'] = '123456789';
        $replaces['fone'] = '74 36124089';

        $content = $template->render($replaces);
        echo $content;
    }

    public function onSaibaMais($param)
    {
        echo 'mais informação ....';
    }
}