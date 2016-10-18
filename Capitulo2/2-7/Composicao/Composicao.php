<?php

//composicao = na composicao o objeto "todo" é responsavel pela cricao e destruicao de suas "partes".

require_once('class/Caracteristica.php');
require_once('class/Produto.php');

//criacao de objetos
$p1 = new Produto('chocolate',10,7);

//composicao
$p1->addCaracteristicas('cor','Branco');
$p1->addCaracteristicas('Peso','2.6kg');
$p1->addCaracteristicas('Potencia','20 watts RMS');
var_dump($p1);
print 'Produto :' . $p1->getDescricao() . "<br>\n";

foreach($p1->getCaracteristicas() as $c){
	print ' Caracteristica : ' . $c->getNome() . ' - ' . $c->getValor() . "<br>\n";

}