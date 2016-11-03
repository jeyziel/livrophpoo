<?php

class Titulo{
    private $data;
    public $teste;

    public function __construct()
    {
        $this->teste = 'jeyziel';
    }

    public function __set($propriedade,$valor){
        $this->data[$propriedade] = $valor;
    }

    public function __get($propriedae){
        return $this->data[$propriedae];
    }

    public function __isset($propriedade){
        return isset($this->data[$propriedade]);
    }

    public function __unset($propriedade){
        unset($this->data[$propriedade]);

    }





}