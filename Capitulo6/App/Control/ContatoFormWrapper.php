<?php

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 10/01/2017
 * Time: 11:35
 */

use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\Text;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Wrapper\FormWrapper;


class ContatoFormWrapper extends Page
{
    private $form;

    public function __construct()
    {
        parent::__construct();

        //instancia um objeto
        $this->form = new FormWrapper(new Form('form_contato'));
        $this->form->style = 'display:block; margin:20px;';

        //cria os campos do formulario
        $nome = new Entry('nome');
        $email = new Entry('email');
        $assunto = new Combo('assunto');
        $mensagem = new Text('mensagem');

        $this->form->addField('Nome', $nome, 300);
        $this->form->addField('Email', $email, 300);
        $this->form->addField('Assunto', $assunto, 300);
        $this->form->addField('Email', $mensagem, 300);

        //define alguns atributos
        $assunto->addItems(array(
            '1' => 'Sugestão',
            '2' => 'Reclamação',
            '3' => 'Suporte técnico'
        ));
        $mensagem->setSize(300,80);

        $this->form->addAction('Enviar', new Action(array($this, 'onSend')));

        $panel = new Panel('Formulario de contato');
        $panel->add($this->form);

        //adiciona o painel á pagina
        parent::add($panel);



    }

    public function onSend()
    {

    }
}