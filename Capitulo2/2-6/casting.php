<?php

$produto = new stdClass();
$produto->Descricao = 'chocolate amargo';
$produto->Estoque = 10;
$produto->Preco = 8;

$vetor1 = (array) $produto;
var_dump($vetor1);

echo '<br>';

print $vetor1['Descricao'] . "<br>\n";

echo "<hr>";


$vetor2 = ['descricao' => 'café', 'Estoque' => 100, 'preco' => 7];
$produto2 = (object) $vetor2;
print $produto2->descricao . "<br>\n";
var_dump($produto2);