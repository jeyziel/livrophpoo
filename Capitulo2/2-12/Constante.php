<?php

require_once('class/Pessoa.php');

$p1 = new Pessoa('jeyziel','M');
$p2 = new Pessoa('maria','F');

print 'NOME :' . $p1->getNome() . "<br>\n";
print 'Genero: '. $p1->getNomeGenero() . "<br>\n";
print 'NOME :' . $p2->getNome() . "<br>\n";
print 'Genero: '. $p2->getNomeGenero() . "<br>\n";