<?php


$produto = ['descricao' => 'café', 'Estoque' => 100, 'preco' => 7];

$objeto = new stdClass();

foreach ($produto as $key => $value) {
	$objeto->$key = $value;
}

var_dump($objeto);
echo $objeto->descricao;
	