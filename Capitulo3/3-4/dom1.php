<?php

$doc = new DOMDocument();
$doc->load('base.xml');


$bases = $doc->getElementsByTagName("base");

foreach ($bases as $base){
    Print 'ID: ' .$base->getAttribute('id'). '<br>' . PHP_EOL;


    $names = $base->getElementsByTagName('name');

    $name = $names->item(0)->nodeValue;

    print 'Name :' . $name . "<br>\n";





}

