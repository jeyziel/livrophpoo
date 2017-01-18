<?php

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 21/12/2016
 * Time: 18:42
 */

use Livro\Control\Page;
use Livro\Database\Transaction;
use Livro\Database\Repository;
use Livro\Database\Criteria;

class CidadeControl extends Page
{
    public function listar()
    {

        try{
            Transaction::open('livro');
            $criteria = new Criteria();
            $criteria->setProperty('order','id');

            $repository = new Repository('Cidade');
            $cidades = $repository->load($criteria);

            if($cidades){
                foreach ($cidades as $cidade){
                    print "{$cidade->id} - {$cidade->nome}<br>\n";
                }
            }

            Transaction::close();

        }
        catch (Exception $e){
            print $e->getMessage();
        }
    }
}