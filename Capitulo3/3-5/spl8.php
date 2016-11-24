<?php

$dados = ['salmao','tilapia','sardinha','badejo','pescada','dourado'];

$objarray = new ArrayObject($dados);

//acrescenta
$objarray->append('bacalhau');

//obtem posicao 2
print 'Posicao 2: ' . $objarray->offsetGet(2) . '<br>' . PHP_EOL;

//substitui posicao 2
$objarray->offsetSet(2,'linguado');
print 'Posicao 2: ' . $objarray->offsetGet(2) . '<br>' . PHP_EOL;

//elimina a posicao 4
$objarray->offsetUnset(4);
$objarray->offsetUnset(5);

var_dump($objarray);

print '<hr>';

//teste se posicao existe
if($objarray->offsetExists(6)){
    echo 'Posicao 6 encontrado' . '<br>' . PHP_EOL;
}else{
    echo 'Posicao 6 nao encontrado' . '<br>'. PHP_EOL;
}

print 'Total: ' . $objarray->count();
$objarray[] = 'atum';//acrescenta
$objarray->natsort();//ordena

//percorre dados
print '<br>' . PHP_EOL;

foreach ($objarray as $item){
    print 'Item: ' . $item . '<br>' . PHP_EOL;
}

print $objarray->serialize();

