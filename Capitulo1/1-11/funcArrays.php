<?php

$a = array("Verde","Azul","Vermelho");
array_unshift($a, "Ciano");//adiciona um elemento no comeco do array
array_push($a,"Amarelo");//adiciona um elemento no fim do array

var_dump($a);

echo "<hr>";

$a = array("ciano","verde","azul","vermelho","amarelo");
array_shift($a);//remove um valor no inicio do array
array_pop($a);//remove um valor no fim do array
var_dump($a);

print "<hr>";

$a = array('verde','amarelo','vermelho','azul');
$b = array_reverse($a,true);//true continua com os indices
var_dump($b);

print "<hr>";

$a = array("verde","azul");
$b = array("vermelho","verde");
$c = array_merge($a,$b);//mescala dois arrays
var_dump($c);

print "<hr>";

$exemplo = array('cor' =>'vermelho','volume' =>'5','animal'=>'cachorro');
var_dump(array_keys($exemplo));//pega as chaves dos arrays
print "<br>";
var_dump(array_values($exemplo));//pega os valores
print 'Quantidade' . count($exemplo);
print "<hr>";

$a = array('refrigerante','Cerveja','vodca','suco natural');
if(in_array('suco natural',$a)){
	echo "encontrei o suco natural";
}else{
	echo 'nao encontrado';
}

print "<hr>";
$a = array('refrigerante','cerveja','vodca','suco natural');
sort($a);//ordena os valores e nao mantem os indices
var_dump($a);

print "<hr>";

$a = ['3','2','0','1'];
asort($a);//ordena pelo valores e mantem o indices
var_dump($a);

print "<hr>";

$carro = array('potencia' => '1.0','cor' => 'branco','modelo' => 'celta', 'opcionais' =>'ar quente');
ksort($carro);
var_dump($carro);

print "<hr>";

$string = '15/10/2016';
var_dump(explode('/',$string));
echo "<br>";
$array = ['15','10','2016'];
print(implode(', ',$array));

print "<hr>";


