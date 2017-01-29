<?php 

use Livro\Database\Criteria;
use Livro\Database\Filter;
use Livro\Database\Record;
use Livro\Database\Repository;

//associoacao com Pessoa
class Conta extends Record
{
	const TABLENAME = 'conta';
	private $cliente;

	public function get_cliente ()
	{
		if (empty($this->cliente))
		{
			$this->cliente = new Pessoa($this->id_cliente);
		}
		return $this->cliente; //retorna o objeto instanciado
	}

	/**
	 * [getByPessoa description]
	 * @return [$repo] [retorna as contas nao pagas relacionado a uma pessoa]
	 */
	public static function getByPessoa ($id_pessoa)
	{
		$criteria = new Criteria;
		$criteria->add(new Filter('paga','<>','S'));
		$criteria->add(new Filter('id_cliente','=',$id_pessoa));

		$repo = new Repository('Conta');
		return $repo->load($criteria);
	}

	public static function debitoPorPessoa($id_pessoa)
	{
		$total = 0;
		$contas = self::getByPessoa($id_pessoa);
		if ($contas)
		{
			foreach ($contas as $conta)
			{
				$total += $conta->valor;
			}
		}
		return $total;
	}

	/**
	 * [gerarParcelas description]
	 * @param  [integer] $id_cliente [id do cliente(pessoa)]
	 * @param  [integer] $delay      [informe o delay em dias]
	 * @param  [float] $valor      [valor da compra]
	 * @param  [integer] $parcelas   [valor da parcela]
	 * gera um conjuntos de parcelas,contas a receber
	 */
	public function gerarParcelas($id_cliente,$delay,$valor,$parcelas)
	{
		$date = new DateTime(date('y-m-d'));
		$date->add(new DateInterval('P'.$delay.'D'));

		for ($n=1; $n<=$parcelas; $n++)
		{
			$conta = new self;
			$conta->id_cliente = $id_cliente;
			$conta->dt_emissao = date('Y-m-d');
			$conta->dt_vencimento = $date->format('Y-m-d');
			$conta->valor = $valor/$parcelas;
			$conta->paga = 'N';
			$conta->store();

			$date->add(new DateInterval('P1M'));
		}
	}
	
}