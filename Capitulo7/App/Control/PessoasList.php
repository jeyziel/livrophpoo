<?php 

use Livro\Control\Action;
use Livro\Control\Page;
use Livro\Database\Criteria;
use Livro\Database\Filter;
use Livro\Database\Repository;
use Livro\Database\Transaction;
use Livro\Widgets\Container\HBox;
use Livro\Widgets\Container\VBox;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridAction;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Dialog\Question;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\DatagridWrapper;
use Livro\Widgets\Wrapper\FormWrapper;

class PessoasList extends Page
{
	private $form; //formulario de buscas
	private $datagrid; //listagem
	private $loaded;

	public function __construct ()
	{
		parent::__construct();

		//instancia um formulario de buscas
		$this->form = new FormWrapper(new Form('form_busca_pessoas'));
		$nome = new Entry('nome');
		$this->form->addField('Nome',$nome, 300); 
		$this->form->addAction('Buscar',new Action(array($this,'onReload')));
		$this->form->addAction('Novo',new Action(array(new PessoasForm,'onSave')));

		//instancia objeto Datagrid
		$this->datagrid = new DatagridWrapper(new Datagrid);
	
		$codigo = new DatagridColumn('id','Codigo','right',50);
		$nome = new DatagridColumn('nome','Nome','left',200);
		$endereco = new DatagridColumn('endereco','Endereco','left',200);
		$cidade = new DatagridColumn('nome_cidade','Cidade','left',140);

		//adiciona colunas a datagrid
		$this->datagrid->addColumn($codigo);
		$this->datagrid->addColumn($nome);
		$this->datagrid->addColumn($endereco);
		$this->datagrid->addColumn($cidade);

		//instancia duas ações da datagrid
		$action1 = new DatagridAction(array(new PessoasForm,'onEdit'));
		$action1->setLabel('Editar');
		$action1->setImage('ico_edit.png');
		$action1->setField('id');

		$action2 = new DatagridAction(array($this,'onDelete'));
		$action2->setLabel('Deletar');
		$action2->setImage('ico_delete.png');
		$action2->setField('id');

		//adiciona as ações á Datagrid
		$this->datagrid->addAction($action1);
		$this->datagrid->addAction($action2);
		//cria modelo da Datagrid, montando sua estrutura
		$this->datagrid->createModel();

		//monta a pagina por meio de uma caixa
		$box = new VBox;
		$box->style = 'display-block';
		$box->add($this->form);
		$box->add($this->datagrid);
		
		parent::add($box);	
	}

	public function onReload()
	{
		try
		{
			Transaction::open('livro'); //inicia transao com O BD
			$repository = new Repository('Pessoa');

			//cria um criterio de selecao de dados
			$criteria = new Criteria;
			$criteria->setProperty('order','id');

			//obtem os dados do formulario de busca
			$dados = $this->form->getData();
			//verifica se o usuario preencheu o formulario
			if (isset($dados->nome))
			{
				$criteria->add(new Filter('nome','like',"%{$dados->nome}%"));
			}
			//carrega os produtos que satisfazem o criterio
			$pessoas = $repository->load($criteria);

			$this->datagrid->clear();

			if ($pessoas)
			{
				foreach ($pessoas as $pessoa)
				{
					//adiciona o objeto a datagrid
					$this->datagrid->addItem($pessoa);
				}
			}
			//finaliza transacao
			Transaction::close();
			$this->loaded = true;
		}
		catch (Exception $e)
		{
			//exibe a mensagem de exceção 
			new Message('error', '<b>Erro  </b>' . $e->getMessage());
			//desgas todas alterações no banco de dados
			Transaction::rollback();
		}

	}

	public function onDelete($param)
	{
		$id = $param['id']; //obtem o parametro id
		$action1 = new Action(array($this,'Delete'));
		$action1->setParameter('id',$id);

		new Question("Deseja Realmente Excluir o registro de CODIGO ?",$action1);
		
	}

	public function Delete($param)
	{
		try
		{
			$id = $param['id'];
			Transaction::open('livro');

			$pessoa = Pessoa::find($id);
			$pessoa->delete();

			Transaction::close(); //finalizaca a transacao

			new Message('info','Registro Excluido com sucesso');

		}
		catch (Exception $e)
		{
			new Message('error',$e->getMessage());
		}
	}

	public function show ()
	{
		if (!$this->loaded)
		{
			$this->onReload();
		}
		parent::show();
	}


}