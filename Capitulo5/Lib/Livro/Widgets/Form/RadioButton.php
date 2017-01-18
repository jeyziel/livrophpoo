<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 06/01/2017
 * Time: 11:02
 */

namespace Livro\Widgets\Form;


class RadioButton extends Field implements FormElementInterface
{
    public function show()
    {
        //atribui as propriedades da tag
        $this->tag->name = $this->name;
        $this->tag->value = $this->value;
        $this->tag->type = 'radio';

        //se o campo nao é editavel
        if(!parent::getEditable())
        {
            $this->tag->readonly = "1";
        }

        //exibi a tag
        $this->tag->show();

    }
}