<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 12:09
 */

namespace Livro\Widgets\Form;

use Livro\Widgets\Base\Element;


class Label extends Field implements FormElementInterface
{
    public function __construct($value)
    {
        $this->setValue($value);
        $this->tag = new Element('label');
    }

    public function add($child)
    {
        $this->tag->add($child);
    }

    public function show()
    {
        $this->tag->add($this->value);
        $this->tag->show();
    }
}