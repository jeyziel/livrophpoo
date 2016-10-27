<?php 

function apresenta($nome){
	echo "ola senhor {$nome} <br>\n";
}

//executa a função
call_user_func('apresenta','jeyziel');

//declaração de classe
class Pessoa{
	public static function apresenta($nome){
		echo "ola senhor {$nome} <br>\n";
	}
}

//execura a funcao na classe static
call_user_func(array('Pessoa','Apresenta'),'Jeyziel');

$obj = new Pessoa;
call_user_func(array($obj,'Apresenta'),'Jeyziel');