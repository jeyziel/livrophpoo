<?php

//interpreta o arquivo

$xml = simplexml_load_file('paises2.xml');


//alteracoes de propriedades
$xml->moeda = 'Novo Real';
$xml->geografia->clima = 'temperado';
//adiciona novo nodo
$xml->addChild('presidente','Chapolim Colorado');
//exibindo o novo xml
echo $xml->asXML();
//grava no arquivo paises2.xml
file_put_contents('paises2.xml',$xml->asXML());



