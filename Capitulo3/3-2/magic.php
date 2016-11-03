<?php

require_once('classes/Titulo.php');

$titulo = new Titulo;
$titulo->valor = 12345;

print 'O VALOR É: ' . number_format($titulo->valor,2,',','.');

print "<hr>";

if(isset($titulo->valor)){
    print "Valor definido\n";
}
else{
    print "Valor nao definido\n";
}

unset($titulo->valor);

if(isset($titulo->valor)){
    print "Valor definido\n";
}
else{
    print "Valor nao definido\n";
}




