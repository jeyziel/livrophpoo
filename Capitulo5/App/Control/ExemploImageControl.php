<?php

use Livro\Control\Page;
use Livro\Widgets\Base\Image;


class ExemploImageControl extends Page
{
    public function __construct()
    {
        parent::__construct();

        $img = new Image('App/Images/jeyziel.jpg');
        $img->style = 'margin: 20px;';
        parent::add($img);
    }

}