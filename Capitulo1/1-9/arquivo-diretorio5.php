<?php 

$origem = 'images/copia.txt';
$destino = 'images/copia2.txt';

if(rename($origem,$destino)){
	echo 'Renomeado com sucesso';
}else{
	echo 'erro ao renomear';
}