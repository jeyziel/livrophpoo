<?php

require_once('classes/veiculo.php');

$rm = new ReflectionProperty('Automovel','placa');
print $rm->getName() . '<br>' . PHP_EOL;

print $rm->isProtected() ? 'é protected' : 'nao é protected' . '<br>' . PHP_EOL;
print $rm->isStatic() ? 'é estatico' : 'nao é estatico' . '<br>' . PHP_EOL;
print $rm->isPrivate() ? 'é privado' : 'nao e privado' . '<br>' . PHP_EOL;


