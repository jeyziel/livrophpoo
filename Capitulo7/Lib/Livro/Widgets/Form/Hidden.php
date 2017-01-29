<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 14:27
 */

namespace Livro\Widgets\Form;


class Hidden extends Field implements FormElementInterface
{
    public function show()
    {
       $this->tag->name = $this->name;  //nome da tag
       $this->tag->value = $this->value; //valor da tag
       $this->tag->type = 'hidden'; //tipo do input
       $this->tag->style = "width:{$this->size}px"; //tamanho em pixels

       //exibe a tag
       $this->tag->show();

    }

}