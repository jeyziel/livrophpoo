<?php

$dom = new DOMDocument('1.0',"UTF-8");
$dom->formatOutput = true;

$bases = $dom->createElement('bases');
$base = $dom->createElement('base');
$bases->appendChild($base);
$attr = $dom->createAttribute('id');
$attr->value = 1;
$base->appendChild($attr);
$base->appendChild($dom->createElement('name','teste'));
echo $dom->saveXML($bases);