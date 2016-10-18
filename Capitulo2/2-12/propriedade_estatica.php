<?php

//cria novos objetos

require_once('class/Software.php');

new Software('Dia');
new Software('Gimp');

echo 'Quantidade criada = ' . Software::$contador;