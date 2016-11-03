<?php

require_once('classes/Titulo2.php');

$titulo = new Titulo2;
$titulo->codigo = 1;
$titulo->dt_vencimento = '2015-05-20';
$titulo->valor = 12345;
$titulo->juros = 0.1;
$titulo->multa = 2;

$titulo->var_dump();
print 'A contagem é: ' . $titulo->count();