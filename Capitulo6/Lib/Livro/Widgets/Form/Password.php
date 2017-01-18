<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 14:00
 */

namespace Livro\Widgets\Form;


class Password extends Field implements FormElementInterface
{
    public function show()
    {
        $this->tag->name = $this->name; //nome da tag
        $this->tag->value = $this->value; //valor da tag
        $this->tag->type = 'password';
        $this->tag->style = "width:{$this->size}px"; //tamanho de pixels

        if(!parent::getEditable()){
            $this->tag->redonly = "1";
        }

        $this->tag->show();

    }
}