<?php

require_once 'classes/Record.php';

class Pessoa extends Record{
    const TABLENAME = 'pessoas';
}

class Fornecedor extends Record{
    const TABLENAME = 'fornecedores';
}

class Produto extends Record{
    const TABLENAME = 'produto';
}

$p = new Pessoa;
$p->load(1);
print '<br>' . PHP_EOL;

$p->name = 'Maria da silva';
$p->endereco = 'Rua das Flores';
$p->numero = '123';
$p->save();

print '<br>' . PHP_EOL;

$p->delete(3);
print '<br>' . PHP_EOL;


