<?php

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 13/01/2017
 * Time: 15:31
 */

use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Datagrid\DatagridAction;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Dialog\Question;
use Livro\Database\Transaction;
use Livro\Database\Repository;
use Livro\Database\Criteria;

class FuncionarioList extends Page
{
    private $datagrid; //listagem
    private $loaded;

    public function __construct()
    {
        parent::__construct();
        //instancia objeto datagrid
        $this->datagrid = new Datagrid();
        $this->datagrid->border = 1;
        $this->datagrid->style = 'max-width: 650px';

        //instancia as colunas da datagrid
        $codigo = new DatagridColumn('id', 'Codigo', 'right', 50);
        $nome = new DatagridColumn('nome', 'Nome','left',500);
        $endereco = new DatagridColumn('endereco','Endereco','left',700);
        $email = new DatagridColumn('email', 'Email','left',200);

        //adiciona as colunas a Datagrid
        $this->datagrid->addColumn($codigo);
        $this->datagrid->addColumn($nome);
        $this->datagrid->addColumn($endereco);
        $this->datagrid->addColumn($email);

        //instancia duas ações da Datagrid
        $action1 = new DatagridAction(array(new FuncionarioForm,'onEdit'));
        $action1->setLabel('Editar');
        $action1->setImage('ico_edit.png');
        $action1->setField('id');

        $action2 = new DatagridAction(array($this,'OnDelete'));
        $action2->setLabel('Deletar');
        $action2->setImage('ico_delete.png');
        $action2->setField('id');

        //adiciona as ações á dataGrid
        $this->datagrid->addAction($action1);
        $this->datagrid->addAction($action2);

        //cria o modelo da datagrid montando sua estrutura
        $this->datagrid->createModel();
        parent::add($this->datagrid);
    }

    public function onReload()
    {
        Transaction::open('livro');//inicia transacao com o bd
        $repository = new Repository('Funcionario');

        //cria um criterio de selecao de dados
        $criteria = new Criteria;
        $criteria->setProperty('order','id');

        //carrega os produtos que satisfazem o critério
        $funcionarios = $repository->load($criteria);
        $this->datagrid->clear();

        if($funcionarios)
        {
            foreach ($funcionarios as $funcionario)
            {
                //adiciona o objeto a datagrid
                $this->datagrid->addItem($funcionario);
            }
        }
        Transaction::close(); //finaliza a transação
        $this->loaded = true;
    }

    public function onDelete($param)
    {
        $id = $param['id']; //obtem o parametro $id
        $action1 = new Action(array($this,'Delete'));
        $action1->setParameter('id',$id);
        new Question("Deseja Realmente exluir o registo de código {$param['id']}?", $action1);
    }

    public function Delete($param)
    {
        try
        {
            $id = $param['id']; // obtém a chave
            Transaction::open('livro'); // inicia transação com o banco 'livro'
            $funcionario = Funcionario::find($id); // busca objeto Funcionario
            if ($funcionario) {
                $funcionario->delete(); // deleta objeto do banco de dados
            }
            Transaction::close(); // finaliza a transação
            $this->onReload(); // recarrega a datagrid
            new Message('info', "Registro excluído com sucesso");
        }
        catch (Exception $e)
        {
            new Message('error', $e->getMessage());
        }
    }

    public function show()
    {
        //esse metodo sempre será executado
        if(!$this->loaded)
        {
            ECHO 'ENTREI';
            $this->onReload();
        }
        parent::show();
    }


}