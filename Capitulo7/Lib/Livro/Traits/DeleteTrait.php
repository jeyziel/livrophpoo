<?php 

namespace Livro\Traits;

use Livro\Control\Action;
use Livro\Database\Transaction;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Dialog\Question;

trait DeleteTrait
{
	public function Delete ($param)
	{
		$id = $param['id'];
		$action1 = new Action(array($this,'onDelete'));
		$action1->setParameter('id',$id);
		new Question('Deseja Realmente exluir o registro?',$action1);
	}

	public function onDelete ($param)
	{
		try
		{
			$id = $param['id'];
			Transaction::open($this->connection); //abre a transação
			$class = $this->activeRecord;

			$object = new $class($id);

			if ($object)
			{
				$object->delete();
			}
			Transaction::close();
			$this->onReload();
			new Message('info',"Registro Excluido com Sucesso");
		}
		catch (Exception $e)
		{
			new Message('erro',$e->getMessage());
		}
	}
}