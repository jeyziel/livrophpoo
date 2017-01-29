<?php 

use Livro\Control\Action;
use Livro\Control\Page;
use Livro\Database\Criteria;
use Livro\Database\Filter;
use Livro\Database\Repository;
use Livro\Database\Transaction;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\FormWrapper;

class ContasReport extends Page
{
	private $form; //formulario de entrada

	public function __construct ()
	{
		parent::__construct();

		//intancia um formulário
		$this->form = new FormWrapper(new Form('form_relat_contas'));

		//cria os campos do formulário
		$data_ini = new Entry('data_ini');
		$data_fim = new Entry('data_fim');

		$this->form->addField('Vencimento Inicial',$data_ini,200);
		$this->form->addField('Vencimento Final',$data_fim,200);
		$this->form->addAction('Gerar',new Action(array($this,'onGera')));

		$panel = new Panel('Relatório de contas');
		$panel->add($this->form);

		parent::add($panel);

	}

	public function onGera ()
	{
		require_once "Lib/Twig/Autoloader.php";
		Twig_Autoloader::register();

		$loader = new Twig_Loader_Filesystem('App/Resources');
		$twig = new Twig_Environment($loader);
		$template = $twig->loadTemplate('contas_report.html');

		//obtem os dados do formulario
		$dados = $this->form->getData();

		//joga os de volta ao formulario
		$this->form->setData($dados);

		$conv_data_to_us = function ($data)
		{
			if (!empty($data))
			{
				$data = explode('/',$data);
			    return "$data[2]-$data[1]-$data[0]";
			}
		};

		//lê os campos do formulario, converte para o padrão americano
		$data_ini = $conv_data_to_us($dados->data_ini);
		$data_fim = $conv_data_to_us($dados->data_fim);

		//vetor de parametros para o template
		$replaces = array();
		$replaces['data_ini'] = $dados->data_ini;
		$replaces['data_fim'] = $dados->data_fim;

		try
		{
			//inicia transação com o banco 'livro';
			Transaction::open('livro');

			//instancia um repositorio da classe conta
			$repositorio = new Repository('Conta');

			//cria um critério de seleção por intervalo de datas
			$criteria = new Criteria;
			$criteria->setProperty('order','dt_vencimento');

			if ($dados->data_ini)
			{
				$criteria->add(new Filter('dt_vencimento','>=',$data_ini));
			}
			if ($dados->data_fim)
			{
				$criteria->add(new Filter('dt_vencimento','<=',$data_fim));
			}

			//lê todas as contas que satisfazem ao criterio
			$contas = $repositorio->load($criteria);
			
			if ($contas)
			{
				foreach ($contas as $conta)
				{
					$conta_array = $conta->toArray();
					$conta_array['nome_cliente'] = $conta->cliente->nome;
					$replaces['contas'][] = $conta_array;
				}
			}
			//finaliza a transação
			Transaction::close();
		}
		catch (Exception $e)
		{
			new Message('error',$e->getMessage());
		}
		$content = $template->render($replaces);

		parent::add($content);

	}
}