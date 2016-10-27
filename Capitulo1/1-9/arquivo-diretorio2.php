<?php
echo file_put_contents("test.txt","este\n é o conteudo\n do arquivo").'<br>';// Escreve uma string para um arquivo

echo file_get_contents('test.txt');//Lê todo o conteúdo de um arquivo para uma string

$diretorio = '../../';
if(is_dir($diretorio)){
    $linhas = scandir($diretorio);//ista os arquivos e diretórios que estão no caminho especificado
    foreach ($linhas as $linha){
        print $linha. '<br>' . PHP_EOL;
    }
}

$dir = 'images/';
if(mkdir($dir,0777)) {
    echo "Diretorio criado com sucesso";
}else{
    echo "Diretorio nao criado";
}

//rmdir apaga um diretorio