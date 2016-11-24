<?php

$dados = ['nome' => 'jeyziel', 'idade' => '17'];
var_dump($dados);


//array_flip///
$xml = new SimpleXMLElement('<pessoa/>');
array_walk_recursive($dados,array($xml,'addChild'));
file_put_contents('dados1.xml',$xml->asXML());
