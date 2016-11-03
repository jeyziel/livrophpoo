<?php

//interpreta o documento xml

$xml = simplexml_load_file('paises4.xml');

//print_r($xml);
foreach ($xml->estados->estado as $estado){
    echo str_pad('Estado : '     . $estado['nome'],30) .
                'Capital : '      . $estado['capital'] . "<br>\n";

}


