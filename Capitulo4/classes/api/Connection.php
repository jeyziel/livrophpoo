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

		//lê as informacoes contidas no arquivos
		$user = $db['user'] ?? NULL;
		$pass = $db['pass'] ?? NULL;
		$name = $db['name'] ?? NULL;
		$host = $db['host'] ?? NULL;
		$type = $db['type'] ?? NULL;
		$port = $db['port'] ?? NULL;

		//descobre qual o drive
		switch($type){
			case 'mysql' :
				$port = $port ?? '3306';
				$conn = new PDO("mysql:host={$host};port={$port};dbname={$name}",$user,$pass);
				break;
			case 'sqlite' :
			   $conn = new PDO("sqlite:{$name}");
			   break;		
		}

		//lançar execoes
		
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conn;

	}






}

