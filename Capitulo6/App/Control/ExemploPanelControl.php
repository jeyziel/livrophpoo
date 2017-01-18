<?php

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 01/01/2017
 * Time: 18:00
 */

use Livro\Control\Page;
use Livro\Widgets\Container\Panel;

class ExemploPanelControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        $panel = new Panel('Titulo do Painel');
        $panel->style = 'margin: 20px';
        $panel->add(str_repeat('sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf <br>',5));
        $panel->show();
    }
}