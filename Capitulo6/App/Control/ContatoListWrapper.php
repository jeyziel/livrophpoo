<?php 

use Livro\Control\Page;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Control\Action;
use Livro\Widgets\Datagrid\DatagridAction;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Wrapper\DatagridWrapper;


class ContatoListWrapper extends Page 
{
	private $datagrid; //listagem

	public function __construct()
	{
		parent::__construct();

		//instancia o objeto datagrid
		$this->datagrid = new DatagridWrapper(new Datagrid);
		$this->datagrid->style = 'max-width:700px';

		//instancia as colunas da Datagrid
		$codigo = new DatagridColumn('id','Codigo','center',80);
		$nome = new DatagridColumn('nome','Nome','left',200);
		$email = new DatagridColumn('email','Email','left',150);
		$assunto = new DatagridColumn('assunto','Assunto','left',250);

		//adiciona as colunas á Datagrid
		$this->datagrid->addColumn($codigo);
		$this->datagrid->addColumn($nome);
		$this->datagrid->addColumn($email);
		$this->datagrid->addColumn($assunto);

		$action2 = new DatagridAction(array($this,'onDelete'));
        $action2->setLabel('Deletar');
        $action2->setImage('ico_delete.png');
        $action2->setField('id');


		//cria o modelo da Datagrid, montando sua estrutura
		$this->datagrid->createModel();

		//adiciona a datagrid a pagina
		parent::add($this->datagrid);
	}

	public function onTeste()
	{
		echo 'eae';
	}

	public function onReload()
	{
		$this->datagrid->clear();

		$m1 = new stdClass;
		$m1->id = 1;
		$m1->nome = 'Maria Da silva';
		$m1->email = 'maria@email.com';
		$m1->assunto = 'duvida sobre formulario';
		$this->datagrid->addItem($m1);

		$m2 = new stdClass;
		$m2->id = 1;
		$m2->nome = 'Maria Da silva';
		$m2->email = 'maria@email.com';
		$m2->assunto = 'duvida sobre formulario';
		$this->datagrid->addItem($m2);

	}

	public function show()
	{
		$this->onReload();
		parent::show();
	}
}