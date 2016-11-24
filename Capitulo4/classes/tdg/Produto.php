<?php 

class Produto 
{
	private static $conn;
	private $data;
	//private $nomee = 'jeyziel';

	public function __set($prop,$value)
	{
		return $this->data[$prop] = $value;
	}

	public function getData()
	{
		return $this->data;
	}

	public function __get($prop)
	{
		return $this->data[$prop];
	}

	public static function setConnection(PDO $conn)
	{
		self::$conn = $conn;
		ProdutoGateway::setConnection($conn);
	}

	public static function find($id)
	{
		$gw = new ProdutoGateway;
		return $gw->find($id,'Produto');
	}

	public static function all($filter = '')
	{
		$gw = new ProdutoGateway;
		return $gw->all($filter,'Produto');
	}

	public function delete()
	{
		$gw = new ProdutoGateway;
		return $gw->delete($this->data['id']);//ou $this->id
	}

	public function save()
	{
		$gw = new ProdutoGateway;
		return $gw->save((object) $this->data);
	}

	public function getMargemLucro()
	{
		return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
	}

	public function registraCompra($custo,$quantidade)
	{
		$this->preco_custo = $custo;
		$this->estoque += $quantidade;
	}




	
}
