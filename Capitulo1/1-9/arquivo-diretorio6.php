<?php

$origem = 'images/lol.txt';

if(unlink($origem)){
	echo 'apagado com sucesso';
}else{
	echo 'arquivo nao apagado';
}