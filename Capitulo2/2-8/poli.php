<?php

require_once('class/Conta.php');
require_once('class/ContaCorrente.php');
require_once('class/ContaPoupanca.php');

$contas = array();
$contas[] = new ContaCorrente(6677,"CC.1234.56",100,500);
$contas[] = new ContaPoupanca(6678,"PP.1234.56",100);

//print $contas[0]->getInfo();

var_dump($contas);

echo "<hr>";

foreach ($contas as $key => $conta){
    print "conta: {$conta->getInfo()}<br>\n";
    print " Saldo Atual: {$conta->getSaldo()} <br>\n";
    $conta->depositar(200);
    print "  Depósito de 200<br>\n";
    print "  Saldo atual : {$conta->getSaldo()} <br>\n";

    if($conta->retirar(700)){
        print " Retirada de: 700 <br>\n";
    }
    else{
        print " Retirada de: 700 (NÃO PERMITIDA) seu saldo e {$conta->getSaldo()}<br>\n";
    }

    print " Saldo Atual: {$conta->getSaldo()}<br>\n";

    print "<hr>";

}

var_dump($contas);



