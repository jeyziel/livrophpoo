<?php

//interpreta o documento xml
$xml = simplexml_load_file('paises.xml');

var_dump($xml->children());

echo "<hr>";
//children retora o elementos filhos.
foreach ($xml->children() as $elemento => $valor){
    echo "$elemento -> $valor <br>\n";
}
