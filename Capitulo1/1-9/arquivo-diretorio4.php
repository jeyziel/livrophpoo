<?php

$origem = 'copia.txt';
$destino = 'images/copia.txt';

if(copy($origem,$destino)){
	echo "copia efetuada com sucesso";
}else{
	echo "erro ao efetuar a copia";
}