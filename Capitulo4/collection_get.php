<?php

//carrega as classes

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Expression.php';
require_once 'classes/api/Criteria.php';
require_once 'classes/api/Repository.php';
require_once 'classes/api/Record.php';
require_once 'classes/api/Filter.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/model/Produto.php';

try
{
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('log_collection_get.txt'));
    // define o critério de seleção
    $criteria = new Criteria;
    $criteria->add(new Filter('estoque', '>=',  10));
    $criteria->add(new Filter('origem',  '=',  'N'));

    // cria o repositório
    $repository = new Repository('Produto');
    // carrega os objetos, conforme o critério
    $produtos = $repository->load($criteria);
    //var_dump($produtos);
    if($produtos)
    {
        echo 'Produtos' . "<br>\n";
        foreach ($produtos as $produto)
        {
            echo 'ID: ' . $produto->id;
            echo ' - Descricao: ' . $produto->descricao;
            echo "<br>\n";
        }
    }



    //update
    if($produtos)
    {

        foreach ($produtos as $produto)
        {
            $produto->preco_venda *= 1.3;
            $produto->store();
        }
    }


    print "Quantidade: " . $repository->count($criteria);
    //$a = Produto::all();
    //var_dump($a);



    Transaction::close();

}
catch (Exception $e)
{
    echo $e->getMessage();
    Transaction::rollback();
}