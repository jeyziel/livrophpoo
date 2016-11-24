<?php

//ultimo a entrar primeiro a sair

$ingredientes = new SplStack();

//acrescentando na fila
$ingredientes->push('peixe');
$ingredientes->push('Sal');
$ingredientes->push('Limão');
var_dump($ingredientes);

print '<hr>';

foreach ($ingredientes as $item){
    print 'Item: ' . $item . '<br>' . PHP_EOL;
}

print PHP_EOL;

//removendo da pilha

print $ingredientes->pop() . '<br>' . PHP_EOL;
print 'Count: ' . $ingredientes->count() . '<br>' . PHP_EOL;

print $ingredientes->pop() . '<br>' . PHP_EOL;
print 'Count: ' . $ingredientes->count() . '<br>' . PHP_EOL;

print $ingredientes->pop() . '<br>' . PHP_EOL;
print 'Count: ' . $ingredientes->count() . '<br>' . PHP_EOL;



