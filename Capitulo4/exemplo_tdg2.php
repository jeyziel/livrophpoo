<?php

require_once "classes/tdg/ProdutoGateway.php";
require_once "classes/tdg/Produto.php";

try{
	$conn = new PDO('sqlite:database/estoque.db');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	Produto::setConnection($conn);

	$produtos = Produto::all();
	//print $produtos[0]->id;

	foreach($produtos as $produto){
		$produto->delete();
	}

	$p1 = new Produto;
	$p1->descricao = 'Vinho Brasileiro';
	$p1->estoque = 10;
	$p1->preco_custo = 12;
	$p1->preco_venda = 18;
	$p1->codigo_barras = '13523453234234';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();

	$p2 = new Produto;
	$p2->descricao = 'Vinho Brasileiro';
	$p2->estoque = 10;
	$p2->preco_custo = 12;
	$p2->preco_venda = 18;
	$p2->codigo_barras = '13523453234234';
	$p2->data_cadastro = date('Y-m-d');
	$p2->origem = 'N';
	$p2->save();

	$p3 = Produto::find(1);
	print 'Descrição:' . $p3->descricao . "<br>\n";
	print 'Margem de Lucro: ' . $p3->getMargemLucro() . "% <br>\n";
	$p3->registraCompra(14,5);
	$p3->preco_custo = 100;
	$p3->save();
	
}catch(Exception $e){
	print $e->getMessage();
}





