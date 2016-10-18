<?php

require('../../config.php');

class Produto{
	private $Descricao;
	private $Estoque;
	private $Preco;

	
	public function __construct($Descricao,$Estoque,$Preco){
		if(is_string($Descricao)):
			$this->Descricao = (string)$Descricao;
		endif;
		
		if(is_numeric($Estoque) and $Estoque > 0):
			$this->Estoque = (int) $Estoque;
		endif;	
		
		if(is_numeric($Preco) and $Preco > 0):
			$this->Preco = (int) $Preco;
		endif;	

	}

	public function AumentarEstoque($Unidades){
		if(is_numeric($Unidades) && $Unidades >=0):
			$this->Estoque += $Unidades;
		endif;	
	}

	public function DiminuirEstoque($Unidades){
		if(is_numeric($Unidades) && $Unidades >=0):
			$this->Estoque -= $Unidades;
		endif;	
	}

	public function ReajustarPreco($Percentual){
		if(is_numeric($Percentual) && $Percentual >= 0):
			$this->Preco *= (1+($Percentual/100));
		endif;	
	}

	//metodos return;
	public function getDescricao(){
		return $this->Descricao;
	}

	public function getEstoque(){
		return $this->Estoque;
	}

	public function getPreco(){
		return $this->Preco;
	}

	

}

$p1 = new Produto('chocolate',15,15);

print "O Estoque de {$p1->getDescricao()} é {$p1->getEstoque()}<br>\n";
print "O preço de {$p1->getDescricao()} é {$p1->getPreco()}<br>\n";

$p1->AumentarEstoque(10);
$p1->DiminuirEstoque(5);
$p1->ReajustarPreco(50);


print "O Estoque de {$p1->getDescricao()} é {$p1->getEstoque()}<br>\n";
print "O preço de {$p1->getDescricao()} é {$p1->getPreco()}<br>\n";


//echo $a = pow(2,3). '<br>';
//echo $a = sqrt(81);