<?php


class teste4
{
    private $data;
    public $eae = 'jey';

    public function __set($prop,$value)
    {
        $this->data[$prop] = $value;
    }

    public function __get($prop)
    {
        return $this->data[$prop];
    }

    public function getData(){
        return $this->data;
    }


}


$a[0] = 'jeyziel';
$a[] = 'nois';

var_dump($a);