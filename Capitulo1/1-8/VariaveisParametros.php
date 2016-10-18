<?php

function incrementa(&$variavel, $valor){
	$variavel += $valor;
}

$a = 10;
incrementa($a,20);
echo $a;
echo "<hr>";

function ola(){
	$argumentos = func_get_args();
	$quantidade = func_num_args();

	for($n=0; $n<$quantidade; $n++){
		echo "olá {$argumentos[$n]} ,";
	}
}

ola('jeyziel','maria','joao','abc');

