<?php


class Titulo2{
    public $codigo,$dt_vencimento,$valor,$juros,$multa;

    public function __call($method,$values){
        return call_user_func($method,get_object_vars($this));

    }
}
