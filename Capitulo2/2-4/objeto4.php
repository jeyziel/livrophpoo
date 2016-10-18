<?php

require('../../config.php');

class Produto{
	private $Descricao;
	private $Estoque;
	private $Preco;

	//metodos publicos
	public function setDescricao($Descricao){
		if(is_string($Descricao)):
			$this->Descricao = (string) $Descricao;
		endif;
	}

	public function setEstoque($Estoque){
		if(is_numeric($Estoque) && $Estoque >= 0 ):
			$this->Estoque = $Estoque;
		endif;			
	}

	public function setPreco($Preco){
		if(is_numeric($Preco) && $Preco >=0):
			$this->Preco = $Preco;
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

$p1 = new Produto;
$p1->setDescricao('chocolate');
$p1->setEstoque(10);
$p1->setPreco(8);

print "O Estoque de {$p1->getDescricao()} é {$p1->getEstoque()}<br>\n";
print "O preço de {$p1->getDescricao()} é {$p1->getPreco()}<br>\n";

$p1->AumentarEstoque(10);
$p1->DiminuirEstoque(5);
$p1->ReajustarPreco(50);


print "O Estoque de {$p1->getDescricao()} é {$p1->getEstoque()}<br>\n";
print "O preço de {$p1->getDescricao()} é {$p1->getPreco()}<br>\n";

