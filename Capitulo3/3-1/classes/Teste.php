<?php 

class Teste{
	public $contador;
	public $data;
	public $a;

	public function __construct(){
		$this->contador = 0;
		$this->data = array('a','b','c','d','e');
		
	}

	public function fetch(){
		if(isset($this->data[$this->contador])){

            /*$this->contador++;
            return $this->data;*/
			
			foreach ($this->data[$this->contador++] as $key => $value) {
				$this->data[$key] = $value;
			}
			return $this->data;
		}
		return false;
	}


}