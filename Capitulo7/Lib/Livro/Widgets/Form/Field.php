<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 06:59
 */

namespace Livro\Widgets\Form;

use Livro\Widgets\Base\Element;

abstract class Field implements FormElementInterface
{
    protected $name;
    protected $size;
    protected $value;
    protected $editTable;
    protected $tag;
    protected $formLabel;

    public function __construct($name)
    {
        self::setEditable(true);
        self::setName($name);
        self::setSize(200);

        $this->tag = new Element('input');
        $this->tag->class = 'field';
        $this->tag->id = $this->getName();
    }

    public function setProperty($name, $value)
    {
        $this->tag->$name = $value;
    }

    public function getProperty($name)
    {
        return $this->tag->$name;
    }

    public function __set($name,$value)
    {
        if(is_scalar($value)){
            $this->setProperty($name, $value);
        }
    }

    public function __get($name)
    {
        return $this->getProperty($name);
    }

    public function setName($name)
    {
       $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setLabel($label)
    {
        $this->formLabel = $label;
    }

    public function getLabel()
    {
        return $this->formLabel;
    }

    public function setValue($value)
    {
       $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setEditable($editable)
    {
        $this->editTable = $editable;
    }

    public function getEditable()
    {
        return $this->editTable;
    }

    public function setSize($width, $height = null)
    {
        $this->size = $width;
    }


}
