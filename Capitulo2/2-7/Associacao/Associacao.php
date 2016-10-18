<?php

//associacao é quando um objeto tem uma referencia de outro objeto;


require_once 'class/Produto.php';
require_once 'class/Fabricante.php';

//criacao de objetos
$p1 = new Produto('chocolate',10,7);
$f1 = new Fabricante('chocolate factory','willy wonka street','12348887');

//associacao
$p1->setFabricante($f1);

print 'A descricao é ' . $p1->getDescricao() . "<br>\n";
print 'O fabricante é ' . $p1->getFabricante()->getNome() . "<br>\n";


