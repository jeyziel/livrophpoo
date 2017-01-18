<?php
use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Container\VBox;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Datagrid\DatagridAction;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Dialog\Question;
use Livro\Database\Transaction;
use Livro\Database\Repository;
use Livro\Database\Criteria;
use Livro\Database\Filter;

/**
 * Listagem de Funcionários
 */
class FuncionarioBuscaList extends Page
{
    private $form; //formulario de buscas
    private $datagrid; //listagem
    private $loaded;

    public function __construct()
    {
        parent::__construct();

        //instancia um formulário para buscas
        $this->form = new Form('form_busca_funcionarios');

        // cria os campos do formulario
        $nome = new Entry('nome');
        $this->form->addField('Nome',$nome,300);
        $this->form->addAction('Buscar',new Action(array($this,'onReload')));
        $this->form->addAction('Novo',new Action(array(new FuncionarioForm,'onEdit')));

        //instancia objeto Datagrid
        $this->datagrid = new Datagrid;
        $this->datagrid->border = 1;
        $this->datagrid->style = 'max-width: 650px';

        //instancia objeto datagrid
        $codigo = new DatagridColumn('id','Código','right',50);
        $nome = new DatagridColumn('nome','Nome','left',200);
        $endereco = new DatagridColumn('endereco','Endereco','left',200);
        $email = new DatagridColumn('email','Email','left',200);

        $codigo_order = new Action(array($this,'onReload'));
        $codigo_order->setParameter('order','id');
        $codigo->setAction($codigo_order);

        $nome_order = new Action(array($this,'onReload'));
        $nome_order->setParameter('order','nome');
        $nome->setAction($nome_order);

        //adiciona as colunas a datagrid
        $this->datagrid->addColumn($codigo);
        $this->datagrid->addColumn($nome);
        $this->datagrid->addColumn($endereco);
        $this->datagrid->addColumn($email);

        //instancia duas ações da Datagrid
        $action1 = new DatagridAction(array(new FuncionarioForm,'onEdit'));
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

        //cria o modelo da Datagrid, montando sua estrutura
        $this->datagrid->createModel();

        //monta a pagina por meio de box vertical
        $box = new VBox;
        $box->style = 'display:block; margin:20px';
        $box->add($this->form);
        $box->add($this->datagrid);
        parent::add($box);
        
    }

    public function onReload($param)
    {
        Transaction::open('livro');//inicia transacao com o BD
        $repository = new Repository('Funcionario');

        //cria um critério de seleção de dados
        $criteria = new Criteria();
        $criteria->setProperty('order',isset($param['order']) ? $param['order'] : 'id');

        //obtém os dados do formulario de buscas
        $dados = $this->form->getData();

        //verifica se o usuario preencheu o formulario
        if ($dados->nome)
        {
            //filtra pelo nome da pessoa
            $criteria->add(new Filter('nome','like',"%{$dados->nome}%"));  
        }

        //carega os produtos q satisfazem o critério
        $funcionarios = $repository->load($criteria);
        $this->datagrid->clear();
        if ($funcionarios)
        {
            foreach ($funcionarios as $funcionario)
            {
                //adiciona objeto a datagrid
                $this->datagrid->addItem($funcionario);
            }
        }
        //FINALIZA A TRANSACAO
        Transaction::close();
        $this->loaded = true;

    }

    /**
     * [onDelete Pergunta sobre a exclusão de registro]
     * $param = Recebe o metodo Get
     */
    public function onDelete($param)
    {
        $id = $param['id']; //obtem o parâmetro id
        $action1 = new Action(array($this,'Delete'));
        $action1->setParameter('id',$id);
        new Question('Deseja realmente excluir o Registro?',$action1);
    }

    /**
     * [Delete description]
     * Exclui os Registro
     * $param = Recebe o metodo get['id']
     */
    public function Delete($param)
    {
        try
        {
            $id = $param['id'];//obtem a chave
            Transaction::open('livro');//inicia transação com o banco
            $funcionario = Funcionario::find($id);//busca objeto funcionario
            if ($funcionario)
            {
                $funcionario->delete();
            }
            Transaction::close();//Finaliza a transação
            $this->onReload($param);
            new Message('info','Registro Excluido com Sucesso');
        }
        catch(Exception $e)
        {
            new Message('error',$e->getMessage());
        }

    }

    public function show()
    {
        if(!$this->loaded)
        {
            $this->onReload(func_get_args());
        }
        parent::show();
    }






}