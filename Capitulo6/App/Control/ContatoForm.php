<?php

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 06/01/2017
 * Time: 21:21
 */

use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Form\Label;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\Text;



class ContatoForm extends Page
{
    private $form;

    public function __construct()
    {
        parent::__construct();

        //instancia um formulario
        $this->form = new form('form_contato');
        $this->form->setFormTitle('Formulario de Contato');
        $this->form->style = 'display:block; margin:20px;';


        //cria os campos do formulario
        $nome = new Entry('nome');
        $email = new Entry('email');
        $assunto = new Combo('assunto');
        $mensagem = new Text('mensagem');

        $this->form->addField('Nome',$nome,300);
        $this->form->addField('Email',$email,300);
        $this->form->addField('Assunto',$assunto,300);
        $this->form->addField('Messagem',$mensagem,300);

        //define os atributo
        $assunto->addItems(array('1' => 'Sugestao',
                                '2' => 'Reclamação'));
        $mensagem->setSize('300',80);

        $this->form->addAction('Enviar',new Action(array($this,'onSend')));
        parent::add($this->form);
    }

    public function onSend()
    {
        try{
            //obtm os dados
            $dados = $this->form->getData();

            //mantem o formulário preenchido
            $this->form->setData($dados);

            //valida
            if(empty($dados->email)){
                throw new Exception('Email Vazio');
            }

            if(empty($dados->assunto)){
                throw new Exception('Assunto Vazio');
            }

            //monta mensagem
            $mensagem = "Nome: {$dados->nome} <br>";
            $mensagem .= "Email: {$dados->email}<br>";

            new Message('info',$mensagem);
        }catch (Exception $e){
            new Message('error','<b>Erro</b>',$e->getMessage());

        }

    }

    public function onLoad()
    {
        $obj = new StdClass;
        $obj->mensagem = 'Escreva aqui o motivo..seja o mais rapido possivel';
        $this->form->setData($obj);
    }


}