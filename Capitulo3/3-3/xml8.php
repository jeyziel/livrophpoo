<?php

//interpreta o documento xml

$xml = simplexml_load_file('paises4.xml');

//percorre os estado
//print_r($xml->estados->estado);

foreach ($xml->estados->estado as $estado){
    foreach ($estado->attributes() as $key => $value){
        echo "$key => $value <br>\n";
    }
}
