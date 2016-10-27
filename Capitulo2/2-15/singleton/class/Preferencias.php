<?php 

class Prefencias{
	private $data;
	private static $instance;

	private function __construct()
	{
		$this->data = parse_ini_file('application.ini');
	}

	//CRIA A INSTANCIA DO OBJETO APENAS UMA VEZ
	public static function getInstance()
	{
		if(empty(self::$instance))
		{
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function setData($key,$value)
	{
		$this->data[$key] = $value;
	}

	public function getData($key)
	{
		return $this->data[$key];
	}

	//salva os dados armazenados em $this->data
	public function save(){
		$string = '';
		if(!empty($this->data)){
			foreach($this->data as $key => $value){
				$string .= "{$key} = \"{$value}\" \n";
			}
		}
		file_put_contents('application.ini',$string);
	}

}