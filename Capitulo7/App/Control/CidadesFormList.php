<?php 

use Livro\Control\Action;
use Livro\Control\Page;
use Livro\Database\Transaction;
use Livro\Traits\DeleteTrait;
use Livro\Traits\EditTrait;
use Livro\Traits\ReloadTrait;
use Livro\Traits\SaveTrait;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Container\VBox;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridAction;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\DatagridWrapper;
use Livro\Widgets\Wrapper\FormWrapper;

class CidadesFormList extends Page
{
	private $form;
	private $datagrid;
	private $loaded;
	private $connection;
	private $activeRecord;

	use EditTrait;
	use DeleteTrait;
	use ReloadTrait
	{
		onReload as onReloadTrait;
	}
	use SaveTrait
	{
		onSave as onSaveTrait;
	}

	public function __construct ()
	{
		parent::__construct();

		$this->connection = 'livro';
		$this->activeRecord = 'Cidade';

		//instancia um formulário
		$this->form = new FormWrapper(new Form('form_cidades'));

		//cria os campos do formulário
		$codigo = new Entry('id');
		$descricao = new Entry('nome');
		$estado = new Combo('id_estado');
		$codigo->setEditable(FALSE);

		Transaction::open('livro');
		$estados = Estado::all();
		$items = array();

		foreach ($estados as $obj_estado)
		{
			$items[$obj_estado->id] = $obj_estado->nome;
		}
		Transaction::close();
		$estado->addItems($items);

		$this->form->addField('Código',$codigo,40);
		$this->form->addField('Nome',$descricao,300);
		$this->form->addField('Estado',$estado,300);

		$this->form->addAction('Salvar',new Action(array($this,'onSave')));
		$this->form->addAction('Limpar',new Action(array($this,'clear')));

		//instancia a datagrid
		$this->datagrid = new DatagridWrapper(new Datagrid);

		//instancia as colunas da datagrid
		$codigo = new DatagridColumn('id','Código','right',50);
		$nome = new DatagridColumn('nome','Nome','left',150);
		$nome_estado = new DatagridColumn('nome_estado','Estado','left',150);

		//adiciona as colunas a datagrid
		$this->datagrid->addColumn($codigo);
		$this->datagrid->addColumn($nome);
		$this->datagrid->addColumn($nome_estado);

		//instancia duas ações da datagrid
		$action1 = new DatagridAction(array($this,'onEdit'));
		$action1->setLabel('Editar');
		$action1->setImage('ico_edit.png');
		$action1->setField('id');

		$action2 = new DatagridAction(array($this,'Delete'));
		$action2->setLabel('Deletar');
		$action2->setImage('ico_delete.png');
		$action2->setField('id');

		//adiciona as acoes a datagrid
		$this->datagrid->addAction($action1);
		$this->datagrid->addAction($action2);
		//cria o modelo de datagrid
		$this->datagrid->createModel();

		$panel1 = new Panel('Cidades');
		$panel1->add($this->form);

		$panel2 = new Panel();
		$panel2->add($this->datagrid);

		//monta a pagina por meio e uma tabela
		$box = new VBox;
		$box->style = 'display:block';
		$box->add($panel1);
		$box->add($panel2);

		parent::add($box);
		
	}

	public function onSave ()
	{
		$this->onSaveTrait();
		$this->onReload();
	}

	public function onReload ()
	{
		$this->onReloadTrait();
		$this->loaded = true;
	}

	public function clear()
	{
		
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