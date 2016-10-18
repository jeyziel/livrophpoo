<?php

$nome = 'jeyziel';
echo strtoupper($nome).'<br>';

$nome = 'JEYZIEL';
print strtolower($nome). '<br>';

$acento = 'ônibus';
$array1 = ['ô'];
$array2 = ['o'];

echo "<hr>";

echo str_replace($array1,$array2,$acento).'<br>';

print substr("Americana",1).'<br>';
print substr("americana",0,3) . '<br>';
print substr("Americana",0,-4).'<br>';

$string = "jeyziel_gato@hotmail.com";
print substr($string,strpos($string,"@"),strpos($string,".") - strpos($string,"@")).'<br>';
print substr($string,0,strpos($string,"@"));

echo "<hr>";

$texto = "the beatles";

print str_pad($texto,20,"*")."<br>\n";
print str_pad($texto,20,'*',STR_PAD_BOTH);

print "<hr>";

$texto = ".o000o.";
print str_repeat($texto,5);

print "<hr>";

$txt = "O Rato roeu a roupa do rei de roma";
print 'O comprimento do texto e de :'. strlen($txt) . "<br>\n";

print "<hr>";

print str_replace("Rato","Leão","O Rato Roeu a Roupa do rei de roma");


 







