<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 22:44
 */

namespace Livro\Widgets\Form;


class CheckButton extends Field implements FormElementInterface
{
    public function show()
    {

        //atribui as propriedadades da tag
        $this->tag->name = $this->name;
        $this->tag->value = $this->value;
        $this->tag->type = 'checkbox';

        //se o campo é editavel
        if(!parent::getEditable())
        {
            $this->tag->readonly = "1";
        }

        //exive a tag
        $this->tag->show();

    }
}