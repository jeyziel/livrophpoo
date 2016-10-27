<?php 

class Funcionario {
	public $nome;
	public $salario;
	public $departamento;

	public function setSalario(){}
	public function getSalario(){}


}

$jose = new Funcionario;

if(method_exists($jose,'setNome')){
	echo 'Objeto jose contém o método setNome()';
}

if(method_exists($jose,'setSalario')){
	echo 'Objeto Jose contém o método setSalario()';
}