<?php

$fd = fopen(__FILE__,"r");
$linha = 1;
while(!feof ($fd)){
    $buffer = fgets($fd,4096);
    if($linha > 1){
        echo $buffer;
    }
    $linha++;
}
fclose($fd);

echo $linha;


    // Abre ou cria o arquivo bloco1.txt
    // "a" representa que o arquivo é aberto para ser escrito
    $fp = fopen("bloco1.txt", "a");

    // Escreve "exemplo de escrita" no bloco1.txt
    $escreve = fwrite($fp, "exemplo de escrita". PHP_EOL);

    // Fecha o arquivo
    fclose($fp);