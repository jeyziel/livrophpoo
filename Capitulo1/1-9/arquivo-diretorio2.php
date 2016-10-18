<?php
echo file_put_contents("test.txt","este\n é o conteudo\n do arquivo").'<br>';

echo file_get_contents('test.txt');

$diretorio = '../../';
if(is_dir($diretorio)){
    $linhas = scandir($diretorio);
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