<?php 

namespace Livro\Traits;

use Livro\Database\Criteria;
use Livro\Database\Repository;
use Livro\Database\Transaction;
use Livro\Widgets\Dialog\Message;

trait ReloadTrait
{
	public function onReload()
	{
		try
		{	
			Transaction::open($this->connection); //abre transação
			$repository = new Repository($this->activeRecord); //Cria repositorio
			// cria um criterio de sleção de dados
			$criteria = new Criteria;
			$criteria->setProperty('order','id');
			//verifica se a há filtros predefinidos
			if (isset($this->filter))
			{
				$criteria->add($this->filter);
			}

			//carrega os dados que satisfazem o criterio
			$objects = $repository->load($criteria);
			$this->datagrid->clear();

			if ($objects)
			{
				foreach ($objects as $object)
				{
					//adiciona objeto a datagrid
					$this->datagrid->addItem($object);
				}
			}
			Transaction::close();
		}
		catch (Exception $e)
		{
			new Message('error',$e->getMessage());
		}
	}
}