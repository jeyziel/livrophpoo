<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 13:30
 */

namespace Livro\Widgets\Form;


class Entry extends Field implements FormElementInterface
{
    public function show()
    {
        $this->tag->name = $this->name; //nome da tag
        $this->tag->value = $this->value;
        $this->tag->type = 'text';
        $this->tag->style = "width:{$this->size}px";

        if(!parent::getEditable()){
            $this->tag->readonly = "1";
        }

        $this->tag->show();

    }
}