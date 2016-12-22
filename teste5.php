<?php

class Pessoa
{
    public static $nome;

    public static function getNome()
    {
        print self::$nome;
    }
}


Pessoa::$nome = 'jeyziel';
Pessoa::getNome();
