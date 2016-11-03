<?php 

require_once('class/Preferencias.php');

//obtem uma instancia
$p1 = Prefencias::getInstance();
print 'A linguagem é: '. $p1->getData('language') . "<br>\n";
$p1->setData('jeyziel','Gama');
$p1->setData('languagee','pt');
print 'A linguagem é: '. $p1->getData('language') . "<br>\n";

//Obtém a mesma instância
$p2 = Prefencias::getInstance();
print 'A linguagem é: ' . $p2->getData('language') . "<br>\n";

$p1->save();





