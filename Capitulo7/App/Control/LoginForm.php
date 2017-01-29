<?php 

use Livro\Control\Action;
use Livro\Control\Page;
use Livro\Session\Session;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Form\Password;
use Livro\Widgets\Wrapper\FormWrapper;

class LoginForm extends Page
{
	private $form; //formulario

	public function __construct()
	{
		parent::__construct();

		//instancia um formulario
		$this->form = new FormWrapper(new Form('form_login'));

		$login = new Entry('login');
		$password = new Password('password');
		$login->placeholder = 'admin';
		$password->placeholder = 'admin';

		$this->form->addField('Senha',$password,200);
		$this->form->addField('Login',$login,200);
		$this->form->addAction('Login', new Action(array($this,'onLogin')));

		$panel = new Panel('Login');
		$panel->add($this->form);

		//adiciona o formulario a pagina
		parent::add($panel);
	}

	 /**
     * Login
     */
    public function onLogin($param)
    {
        $data = $this->form->getData();
        if ($data->login == 'admin' AND $data->password == 'admin')
        {
            Session::setValue('logged', TRUE);
            echo "<script language='JavaScript'> window.location = 'index.php'; </script>";
        }
    }
    
    /**
     * Logout
     */
    public function onLogout($param)
    {
        Session::setValue('logged', FALSE);
        echo "<script language='JavaScript'> window.location = 'index.php'; </script>";
    }



}