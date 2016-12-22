<?php

require_once("classes/api/Connection.php");
require_once("classes/api/Transaction.php");
require_once("classes/ar/ProdutoComTransacao.php");
require_once("classes/api/Logger.php");
require_once("classes/api/LoggerTXT.php");

try{
	Transaction::open('estoque');
	Transaction::setLogger(new LoggerTXT('log.txt'));
	Transaction::log('inserido com sucesso');

	$p1 = new Produto;
	$p1->descricao = 'Vinho Brasileiro tinto merlote';
	$p1->estoque = 10;
	$p1->preco_custo = 12;
	$p1->preco_venda = 13;
	$p1->codigo_barras = '13523453234234';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();

	Transaction::close();
}catch(Exception $e){
	Transaction::rollback();
	print $e->getMessage();
}