<?php
use Livro\Control\Page;
use Livro\Database\Transaction;
use Livro\Log\LoggerTXT;

class ModelTest1 extends Page
{
    public function show()
    {
        try {
            Transaction::open('livro');
            Transaction::setLogger(new LoggerTXT('App/Logs/Logs.txt'));
            
            $c1 = Cidade::find(12);
            print ($c1->nome) . '<br>';
            print ($c1->estado->nome) . '<br>'; //o mesmo que $c1->get->estado()->nome;
            print ($c1->nome_estado)  . '<br>'; //o mesmo que $c1->get_nome_estado();
            
            $p1 = Pessoa::find(1);

            print ($p1->nome) . '<br>';
            print ($p1->nome_cidade) . '<br>'; //o mesmo que $p1->get_nome_cidade
            Transaction::close();   
            
        }
        catch (Exception $e) {
            Transaction::rollback();
            echo $e->getMessage();
        }
    }
}