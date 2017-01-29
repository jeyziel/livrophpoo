<?php 

namespace Livro\Traits;

use Livro\Database\Transaction;
use Livro\Widgets\Dialog\Message;

trait EditTrait
{
	public function onEdit($param) 
	{
		try
		{
			if (isset($param['key']))
			{
				$id = $param['id'];
				Transaction::open($this->connection);
				$class = $this->activeRecord;
				$object = $class::find($id);

				$this->form->setData($object);
				Transaction::close();

			}
		}
		catch (Exception $e)
		{
			new Message('error',"<b>Erro</b> . $e->getMessage()");
			Transaction::rollback();
		}
	}
}