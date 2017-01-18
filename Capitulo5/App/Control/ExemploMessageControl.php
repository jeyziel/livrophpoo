<?php

use Livro\Control\Page;
use Livro\Widgets\Dialog\Message;

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 01/01/2017
 * Time: 22:20
 */
class ExemploMessageControl extends Page
{
    public function __construct()
    {
        parent::__construct();

        new Message('info', 'Messagem informativa');
        new Message('error', 'Mensagem de erro');
    }
}