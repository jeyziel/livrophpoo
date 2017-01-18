<?php

//foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator('Lib/Livro'),
//    RecursiveIteratorIterator::SELF_FIRST) as $entry)
//{
//    print($entry) . "<br>";
//}
//

class teste1
{
    public $itens;

    public function getItens($itens)
    {
        $this->itens[] = $itens;
    }
}

class teste2
{
    public $nome;
    public $itens;

    public function __construct()
    {
        $this->nome = new teste1();
        $this->nome->getItens('jeyziel');
    }

    public function addItens()
    {
        $this->itens[] = $this->nome;

    }

    public function setNome()
    {
        $this->nome->getItens('gama');
        var_dump($this);
    }


}


$a = new teste2();
$a->addItens();
$a->setNome();










//echo 'eae';
//
//echo '&nbsp'.'jeyziel';


















//
//require_once "Lib/Livro/Log/Logger.php";
//require_once "Lib/Livro/Log/LoggerTXT.php";
//require_once "Lib/Livro/Database/Transaction.php";
//
//
//use Livro\Database\LoggerTXT;
//use Livro\Database\Transaction;
//
//Transaction::setLogger(new LoggerTXT('log.txt'));
//Transaction::log('teste');
//
//$letters = array('a', 'p');
//$fruit   = array('apple', 'pear');
//$text    = 'a p';
//$output  = str_replace($letters, $fruit, 'a');
//echo $output;
