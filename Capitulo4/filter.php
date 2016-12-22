<?php

require_once "classes/api/Expression.php";
require_once "classes/api/Filter.php";

$filter1 = new Filter('data','=','21-01-1999');
print $filter1->dump();

echo "<hr>";

$filter2 = new Filter('genero','IN',array('M','F'));
print $filter2->dump();

echo "<hr>";

$filter3 = new Filter('contrato','IS NOT', null);
print $filter3->dump();

