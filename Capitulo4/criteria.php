<?php

//carrega as classes
require_once 'classes/api/Expression.php';
require_once 'classes/api/Criteria.php';
require_once 'classes/api/Filter.php';

$criteria = new Criteria();

$criteria->add(new Filter('idade','<',16),Expression::AND_OPERATOR);
$criteria->add(new Filter('idade','>',array('M','F')),Expression::AND_OPERATOR);
print $criteria->dump() . "<br>\n";

