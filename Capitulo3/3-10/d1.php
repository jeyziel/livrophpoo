<?php

require_once 'a1.php';
require_once 'b1.php';
require_once 'c1.php';

use Library\Widgets\Field;
use Library\Widgets\Form;
use Library\Container\Table;


var_dump(new Field);
print '<hr>';
var_dump(new Form);
print '<hr>';
var_dump(new Table);
print '<hr>';

$f = new Form;
$f->show();
