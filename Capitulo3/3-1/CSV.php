<?php 

//require_once('classes/Teste.php');
//$teste = new Teste;
//$cont = 0;
//
//while($row = $teste->fetch()){
//	print $row[$cont];
//    $cont++;
//
//}

require_once('classes/CSVParser.php');
$csv = new CSVParser('clientes.csv',';');
$csv->parse();

while ($row = $csv->fetch()){
    print $row['Cliente'] . " - ";
    print $row['Cidade'] . " - ";
    print $row['Telefone'] . "<br>\n";
}
