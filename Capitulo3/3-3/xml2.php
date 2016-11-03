<?php

//interpreta o docuimento xml
$xml = simplexml_load_file('paises.xml');

//exibe os atributos do objeto criado

echo 'Nome :' . $xml->nome . "<br>\n";
echo 'Idioma :' . $xml->idioma . "<br>\n";
