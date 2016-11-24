<?php 

final class Connection
{
	private function __construct(){}

	public static function open($name)
	{
		//verifica se existe o arquivo de configuração
		if(file_exists("config/{$name}.ini")){
			$db = parse_ini_file("config/{$name}.ini");
		}else{
			throw new Exception("Arquivo '{$name}' não encontrado");	
		}

		//




	}






}

