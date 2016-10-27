<?php 

class Funcionario {
	public $nome;
	public $salario;
	public $departamento;
}

$jose = new Funcionario;
$jose->nome = 'Jose da silva';
$jose->salario = 2000;
$jose->departamento = 'Financeiro';

var_dump(get_object_vars($jose));