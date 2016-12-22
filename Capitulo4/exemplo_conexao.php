<?php 

require_once "classes/rdg/ProdutoGateway.php";
require_once "classes/api/Connection.php";


try
{
	$conn = Connection::open('estoque');
	ProdutoGateway::setConnection($conn);

	$p1 = new ProdutoGateway;
	$p1->descricao = 'Vinho Brasileiro1';
	$p1->estoque = 10;
	$p1->preco_custo = 12;
	$p1->preco_venda = 13;
	$p1->codigo_barras = '13523453234234';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();



}
catch(Exception $e){
	print $e->getMessage();
}
