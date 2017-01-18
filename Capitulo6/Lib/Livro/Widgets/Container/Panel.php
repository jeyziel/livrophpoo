<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 01/01/2017
 * Time: 17:35
 */

namespace Livro\Widgets\Container;
use Livro\Widgets\Base\Element;


class Panel extends Element
{
    private $body;

    public function __construct($panel_title = NULL)
    {
        parent::__construct('div');
        $this->class = 'panel panel-default';
        if($panel_title){
            $head = new Element('div');
            $head->class = 'panel-heading';
            $label = new Element('h4');
            $label->add($panel_title);
            $title = new Element('div');
            $title->class = 'panel-title';
            $title->add($label);
            $head->add($title);
            parent::add($head);
        }
        $this->body = new Element('div');
        $this->body->class = 'panel-body';
        parent::add($this->body);
    }

    public function add($content)
    {
       $this->body->add($content);
    }

}