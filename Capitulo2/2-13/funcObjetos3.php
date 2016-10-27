<?php

class Funcionario{
	public $nome;
	public $salario;
	public $departamento;
}

class Estagiario extends Funcionario{
	public $bolsa;
}

$jose = new Funcionario;
$joao = new Estagiario;

echo get_class($jose). ' ';//funcionario
echo get_class($joao) . ' ';//Estagiario 
echo get_parent_class($joao).' ';//funcionario
echo get_parent_class('Estagiario') .' ';//funcionario

print "<hr>";

if(is_subclass_of($joao,'Funcionario')){
	echo "Classe do objeto joao e derivada de funcionario";
}

echo "<br>";

if(is_subclass_of('Estagiario','Funcionario')){
	echo "Classe Estagiario é derivada de funcionario";
}

