<?php 

require_once('class/Orcamento.php');
require_once('interface/OrcavelInterface.php');
require_once('class/Produto.php');
require_once('class/Servico.php');

$o = new Orcamento();
$o->adiciona(new Produto('Maquina de café',10,299), 1);
$o->adiciona(new Produto('Barbeador Elétrico',10,170),1);
$o->adiciona(new Produto('Barra de chocolate',10,7),3);
//servicos
$o->adiciona(new Servico('Corte de grama', 20), 1 );


print $o->CalculaTotal();