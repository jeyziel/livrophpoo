<?php

namespace Estudos; 

class Pessoa
{
	private $data;

	function __set($prop,$value){
		$this->data[$prop] = $value;
	}

	function __get($prop){
		return $this->data[$prop];
	}

	

	public function teste()
	{
		print $this->nome;
		print "<br>\n";
		if(empty($this->nome))
		{
			echo "está vazio";
		}
		else
		{
			echo "nao está vazio";
		}
	}
}

use Estudos\Pessoa;
$pessoa = new Pessoa;
$pessoa->nome = 'Maria';
$pessoa->idade = '18'; 
var_dump($pessoa);
echo "<br>";
$pessoa->teste();