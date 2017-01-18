<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 02/01/2017
 * Time: 10:53
 */

namespace Livro\Widgets\Dialog;

use Livro\Control\Action;
use Livro\Widgets\Base\Element;


class Question
{
    public function __construct($message, Action $action_yes, Action $action_no = NULL)
    {
        $div = new Element('div');
        $div->class = 'alert alert-warning';

        //converte os nome de metodos em urls
        $url_yes = $action_yes->serialize();

        $link_yes = new Element('a');
        $link_yes->href = $url_yes;
        $link_yes->class = 'btn btn-success';
        $link_yes->add('Sim');

        //usa o metodo __toString
        $message .= '&nbsp;' . $link_yes;

        if ($action_no)
        {
            $url_no = $action_no->serialize();

            $link_no = new Element('a');
            $link_no->href = $url_no;
            $link_no->class = 'btn btn-default';
            $link_no->add('Nao');

            $message .= $link_no;

        }


        //var_dump($message);

        $div->add($message);
       // var_dump($div);
        $div->show();



    }
}