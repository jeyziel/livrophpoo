<?php
namespace Livro\Traits;

use Livro\Database\Transaction;
use Livro\Widgets\Dialog\Message;
use Exception;

trait SaveTrait
{
    /**
     * Salva os dados do formulário
     */
    function onSave()
    {
        try
        {
            $dados = $this->form->getData();
            $dadosArray = (array) $dados;

            if (in_array('',$dadosArray) and (!empty($dados->nome)))
            {
                Transaction::open( $this->connection );
            
                $class = $this->activeRecord;
                $object = new $class; // instancia objeto
                $object->fromArray( (array) $dados); // carrega os dados
                $object->store(); // armazena o objeto
                
                Transaction::close(); // finaliza a transação
                new Message('info', 'Dados armazenados com sucesso');
            }
            else
            {
                new Message('info','Preencha todos os campos do formulario');
            }
            
        }
        catch (Exception $e)
        {
            new Message('error', $e->getMessage());
        }
    }
}
