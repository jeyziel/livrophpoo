<?php

//interpreta o documento xml.]
$xml = simplexml_load_file('paises.xml');

echo 'Nome :' . $xml->nome ."<br>\n";
echo 'Idioma :' . $xml->idioma . "<br>\n";

echo "<br>\n";
echo "***Informacoes geograficas<br>\n";
echo 'Clima :' . $xml->geografia->clima;





