<?php

require_once "classes/rdg/ProdutoGateway.php";


try{
	$conn = new PDO('sqlite:database/estoque.db');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	ProdutoGateway::setConnection($conn);

	$produtos = ProdutoGateway::all();
	//print $produtos[0]->id;

	foreach($produtos as $produto){
		//$produto->delete();
	}

	$p1 = new ProdutoGateway;
	$p1->descricao = 'Vinho Brasileiro1';
	$p1->estoque = 10;
	$p1->preco_custo = 12;
	$p1->preco_venda = 18;
	$p1->codigo_barras = '13523453234234';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();

	$p2 = new ProdutoGateway;
	$p2->descricao = 'Vinho Brasileiro';
	$p2->estoque = 10;
	$p2->preco_custo = 12;
	$p2->preco_venda = 18;
	$p2->codigo_barras = '13523453234234';
	$p2->data_cadastro = date('Y-m-d');
	$p2->origem = 'N';
	$p2->save();

	$p3 = ProdutoGateway::find(1);
	print 'Descrição:' . $p3->id . "<br>\n";
	$p3->preco_custo = 1001;
	$p3->save();
	var_dump($p3);
	
	
}catch(Exception $e){
	print $e->getMessage();
}





