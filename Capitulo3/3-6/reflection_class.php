<?php

require_once('classes/Veiculo.php');

$rc = New ReflectionClass('Automovel');

var_dump($rc->getMethods());
print '<hr>';
var_dump($rc->getProperties());
print '<hr>';
var_dump($rc->getParentClass());

print '<hr>';


