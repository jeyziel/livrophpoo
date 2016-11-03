<?php

//interpreta o arquivo
$xml = simplexml_load_file('paises3.xml');

echo 'Nome : ' . $xml->nome . "<br>\n";

foreach ($xml->estado->nome as $estado){
    echo 'Estado: ' . $estado . "<br>\n";
}