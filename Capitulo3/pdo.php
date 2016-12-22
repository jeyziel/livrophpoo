<?php

//instancia o pdo,conectando no mysql

$conn = new PDO("mysql:host=localhost;port=3306;dbname=livro",'root','root');

try
{
    //executa instruções sql
    $a = "Jeyziel' LennoN";
    $b =  addslashes($a);
    //$conn->exec("INSERT INTO famosos (codigo,nome) VALUES(1,'a')");
    $conn->query("INSERT INTO famosos (codigo,nome) VALUES(4,'$b')");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


}catch(Exception $e)
{
    //caso ocorra erros
    print "Erro: " . $e->getMessage() . PHP_EOL;


}

