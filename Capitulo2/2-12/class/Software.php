<?php

class Software{
	private $id;
	private $nome;
	public static $contador;

	public function __construct($nome){
		self::$contador ++;
		$this->id = self::$contador;
		$this->nome = $nome;
		print "Softaware {$this->id} - {$this->nome} <br>\n";
	}
}