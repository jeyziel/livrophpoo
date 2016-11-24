<?php

require_once('classes/Veiculo.php');

$rm = new ReflectionMethod('Automovel','setPlaca');
print $rm->getName() . '<br>' . PHP_EOL;

print $rm->isPrivate() ? 'É privado' : 'Nao e privado';
print '<br>' . PHP_EOL;

print $rm->isStatic() ? 'É estatico' : 'Nao e estatico';
print '<br>' . PHP_EOL;

print $rm->isStatic() ? 'É estatico' : 'Nao é estatico';
print '<br>' . PHP_EOL;

print $rm->isFinal() ? 'É final' : 'Nao é final';
print '<br>' . PHP_EOL;

var_dump($rm->getParameters());



