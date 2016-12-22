<?php
require_once "classes/api/Connection.php"; 
require_once "classes/api/Transaction.php";
require_once "classes/rdg/ProdutoGateway.php";

try
{
	Transaction::open('estoque');
	//otem a conexao ativa
	$conn = Transaction::get();
	ProdutoGateway::setConnection($conn);

	$p1 = new ProdutoGateway;
	$p1->descricao = 'Vinho Brasileiro tinto merlote';
	$p1->estoque = 10;
	$p1->preco_custo = 12;
	$p1->preco_venda = 13;
	$p1->codigo_barras = '13523453234234';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();

	throw new Exception("Error Processing Request", 1);

	$p2 = new ProdutoGateway;
	$p2->descricao = 'Vinho Brasileiro tinto1';
	$p2->estoque = 100;
	$p2->preco_custo = 120;
	$p2->preco_venda = 130;
	$p2->codigo_barras = '13523453234234';
	$p2->data_cadastro = date('Y-m-d');
	$p2->origem = 'N';
	$p2->save();

	Transaction::close();
}
catch(Exception $e){
	Transaction::rollback();
	print $e->getMessage();
}

