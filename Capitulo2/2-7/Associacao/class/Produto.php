<?php

class Produto{
	private $descricao;
	private $estoque;
	private $preco;
	private $fabricante;//aponta para um objeto da classe fabricante

	public function __construct($descricao,$estoque,$preco){
		$this->descricao = $descricao;
		$this->estoque = $estoque;
		$this->preco = $preco;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	//recebe um objeto da classe fabricante
	public function setFabricante(Fabricante $fabricante){
		$this->fabricante =  $fabricante;
	}

	//retorn o objeto
	public function getFabricante(){
		return $this->fabricante;
	}


}