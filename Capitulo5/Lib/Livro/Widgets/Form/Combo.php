<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 04/01/2017
 * Time: 21:04
 */

namespace Livro\Widgets\Form;


use Livro\Widgets\Base\Element;

class Combo extends Field implements FormElementInterface
{
    private $items;//array contendo os itens da combo

    public function __construct($name)
    {
        //executa o metodo construtor da classe pai
        parent::__construct($name);

        //cria tag html do tipo <select>
        $this->tag = new Element('select');
        $this->tag->class = 'combo'; //clase css
    }

    public function addItems($items)
    {
        $this->items = $items;
    }

    public function show()
    {
        //atribui as propriedades da tag
        $this->tag->name = $this->name;
        $this->tag->style = "width:{$this->size}px;";//tamanho em px

        //cria uma tag <option> com um valor padrão
        $option = new Element('option');
        $option->add('');
        $option->value = 0; //valor da tag

        //adiciona opção á combo
        $this->tag->add($option);
        if($this->items)
        {
            //percorre os itens adicionados
            foreach ($this->items as $chave => $item)
            {
                //cria uma tava option para cada item
                $option = new Element('option');
                $option->value = $chave;
                $option->add($item); //adiciona o texto da opção


                //caso seja a opçao selecionada
                if($chave == $this->value)
                {
                    $option->selected = 1;

                }
                //adiciona a opção à combo
                $this->tag->add($option);
            }
        }
        if(!parent::getEditable())
        {
            $this->tag->readonly = "1";
        }
        //exibe o combo
        $this->tag->show();
    }

}