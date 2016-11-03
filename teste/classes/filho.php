<?php


class filho extends Pai{
    public $filho;

    public function __construct($nome,$codigo,$filho){
        parent::__construct($nome,$codigo);
        $this->filho = $filho;
    }

}
