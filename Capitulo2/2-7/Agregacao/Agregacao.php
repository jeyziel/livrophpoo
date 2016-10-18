<?php

//relacao toda parte, onde as partes funciona independentes de existir o todo

require_once('class/Cesta.php');
require_once('class/Produto.php');

//criacao da cesta
$c1 = new Cesta();

//agregacao dos produtos

$p1 = new Produto('Chocolate',10,5);
$p2 = new Produto('Cafe',100,7);
$p3 = new Produto('Mostarda',50,3);

$c1->addItem($p1);
$c1->addItem($p2);
$c1->addItem($p3);

var_dump($c1);