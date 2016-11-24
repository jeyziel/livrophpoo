<?php

$dados = array(
    array('codigo','nome','endereco','telefone'),
    array('1','Maria da silva','Rua da maria','74 36124089'),
    array('1','josefa','Rua da josefa','74 36124089')
);

$file = new SplFileObject('dados.csv','w');
$file->setCsvControl(',');

//$dir = opendir('./');//mesmo diretorio
//while($arquivo = readdir($dir)){
//    print $arquivo . '<br>' .PHP_EOL;
//}
//
//closedir($dir);

foreach ($dados as $linha){
    $file->fputcsv($linha);
}

