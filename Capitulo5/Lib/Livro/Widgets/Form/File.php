<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 14:46
 */

namespace Livro\Widgets\Form;


class File extends Field implements FormElementInterface
{
    public function show()
    {
        $this->tag->name = $this->name;
        $this->tag->value = $this->value;
        $this->tag->type = 'file';

        if(!parent::getEditable()){
            $this->tag->readonly = "1";
        }

        $this->tag->show();

    }
}