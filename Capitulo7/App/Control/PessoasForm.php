<?php 

use Livro\Control\Action;
use Livro\Control\Page;
use Livro\Database\Transaction;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Form\CheckGroup;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\FormWrapper;

class PessoasForm extends Page 
{
	private $form;

	public function __construct()
	{
		parent::__construct();
		// instancia um formulário 
		$this->form = new FormWrapper(new Form('form_pessoas'));


		// cria os campos de formulario 
		$codigo = new Entry('id');
		$nome = new Entry('nome');
		$endereco = new Entry('endereco');
		$bairro = new Entry('bairro');
		$telefone = new Entry('telefone');
		$email = new Entry('email');
		$cidade = new Combo('id_cidade');
		$grupo = new CheckGroup('ids_grupos');
		$grupo->setLayout('horizontal');

		//carrega as cidades do banco de dados
		Transaction::open('livro');
		$cidades = Cidade::all();
		$items = array();

		foreach ($cidades as $obj_cidade)
		{
			$items[$obj_cidade->id] = $obj_cidade->nome;
		}
		$cidade->addItems($items);

		$grupos = Grupo::all();
		$items = array();

		foreach ($grupos as $obj_grupo)
		{
			$items[$obj_grupo->id] = $obj_grupo->nome;
		}
		$grupo->addItems($items);
		Transaction::close();

		$this->form->addField('Código',$codigo,40);
		$this->form->addField('Nome',$nome,300);
		$this->form->addField('Endereço',$endereco,300);
		$this->form->addField('Bairro',$bairro,200);
		$this->form->addField('Telefone',$telefone,200);
		$this->form->addField('Email',$email,200);
		$this->form->addField('Cidade',$cidade,200);
		$this->form->addField('Grupo',$grupo,200);

		//define alguns atributos para os campos do formulario
		$codigo->setEditable(FALSE);
		$codigo->setSize(100);
		$nome->setSize(300);
		$endereco->setSize(300);

		$this->form->addAction('Salvar',new Action(array($this,'OnSave')));
		
		//adiciona o formulario
		parent::add($this->form);
		
	}

	public function Onsave ()
	{
		try
		{
			$dados = $this->form->getData();
			
			if (!empty($dados->nome))
			{
				//inicia
				Transaction::open('livro');
				$this->form->setData($dados);
				$pessoa = new Pessoa; //instancia o objeto
				$pessoa->fromArray((array) $dados); //carrega os dados
				$pessoa->store(); //armazena o objeto no bando de dados

				if ($dados->ids_grupos)
				{
					foreach ($dados->ids_grupos as $id_grupo)
					{
						$pessoa->addGrupo(new Grupo($id_grupo));
					}
				}
	 
				Transaction::close(); //Finaliza a transação
				new Message('info','Dados armazenados com sucesso');
			}
			else
			{
				new Message('info','Preencha todos os campos do formulario');
			}


		}
		catch (Exception $e)
		{
			//exibe a mensagem de exceção 
			new Message('error', '<b>Erro  </b>' . $e->getMessage());
			//desgas todas alterações no banco de dados
			Transaction::rollback();

		}
	}


	public function onEdit ($param)
	{
		try
		{
			if (isset($param['key'])) //obtem a chave
			{
				$id = $param['id'];
				Transaction::open('livro');
				$pessoa = Pessoa::find($id);
				$pessoa->ids_grupos = $pessoa->getIdsGrupos();
				$this->form->setData($pessoa); //lança os dados no formulario
				Transaction::close();
			}

		}
		catch (Exception $e)
		{
			//exibe a mensagem de exceção 
			new Message('error', '<b>Erro  </b>' . $e->getMessage());
			//desgas todas alterações no banco de dados
			Transaction::rollback();
		}
	}






}