<?php

class Pessoa{
	private $nome;
	private $genero;
	const GENEROS = array('M' => 'Masculino','F' => 'Feminino');

	public function __construct($nome,$genero){
		$this->nome = $nome;
		$this->genero = $genero;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getNomeGenero(){
		return self::GENEROS[$this->genero];
	}
}