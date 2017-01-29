<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 15:09
 */

namespace Livro\Widgets\Form;


use Livro\Widgets\Base\Element;

class Text extends Field implements FormElementInterface
{
    private $width;
    private $height;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->tag = new Element('textarea');
        $this->tag->class = 'field'; //classe css

        //define a altura padrão da caixa de texto
        $this->height = 100;
    }

    public function setSize($width, $height = null)
    {
       $this->width = $width;
       if(isset($height)){
           $this->height = $height;
       }
    }

    public function show()
    {
        $this->tag->name = $this->name; //nome da tag
        $this->tag->style = "width:{$this->width};height:{$this->height}"; //tamanho em px

        //se o campo nao é editavel
        if(!parent::getEditable())
        {
            $this->readonly = "1";
        }

        //adiciona conteudo ao textarea
        $this->tag->add(htmlspecialchars($this->value));
        //echo $this->value;

        //exibe a tag
        $this->tag->show();
    }
}