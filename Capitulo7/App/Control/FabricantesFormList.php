<?php 

use Livro\Control\Action;
use Livro\Control\Page;
use Livro\Traits\DeleteTrait;
use Livro\Traits\EditTrait;
use Livro\Traits\ReloadTrait;
use Livro\Traits\SaveTrait;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Container\VBox;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridAction;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\DatagridWrapper;
use Livro\Widgets\Wrapper\FormWrapper;


class FabricantesFormList extends Page 
{
	private $form;
	private $datagrid;
	private $connection;
	private $activeRecord;

	use EditTrait;
	use DeleteTrait;
	use SaveTrait
	{
		onSave as onSaveTrait;
	}

	use ReloadTrait
	{
		onReload as onReloadTrait;
	}
	
	public function __construct ()
	{
		parent::__construct();
		$this->connection = 'livro';
		$this->activeRecord = 'Fabricante';

		//intancia o formWrapeer e monta o furmulario
		$this->form = new FormWrapper(new Form('form_fabricantes'));

		$codigo = new Entry('id');
		$nome = new Entry('nome');
		$site = new Entry('site');

		$codigo->setEditable(FALSE);

		$this->form->addField('Codigo',$codigo,50);
		$this->form->addField('Nome',$nome,200);
		$this->form->addField('Site',$site,200);

		$this->form->addAction('Salvar',new Action(array($this,'onSave')));

		//intancia a datagrid
		$this->datagrid = new DatagridWrapper(new Datagrid);

		//intancia as colunas do datagrid
		$codigo = new DatagridColumn('id','Codigo','left',150);
		$nome = new DatagridColumn('nome','Nome','left',150);
		$site = new DatagridColumn('site','Site','left',150);

		//intancia as action
		$action1 = new DatagridAction(array($this,'onEdit'));
		$action1->setLabel('Editar');
		$action1->setField('id');
		$action1->setImage('ico_edit.png');

		$action2 = new DatagridAction(array($this,'Delete'));
		$action2->setLabel('Deletar');
		$action2->setField('id');
		$action2->setImage('ico_delete.png');

		//adiciona as colunas
		$this->datagrid->addColumn($codigo);
		$this->datagrid->addColumn($nome);
		$this->datagrid->addColumn($site);

		//adiciona as actions
		$this->datagrid->addAction($action1);
		$this->datagrid->addAction($action2);

		//cria o modelo de datagrid
		$this->datagrid->createModel();

		$panel1 = new Panel('Fabricantes');
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

	public function show ()
	{
		if (!$this->loaded)
		{
			$this->onReload();
		}
		parent::show();
	}
}