<?php

//instancia o pdo,conectando no mysql

$conn = new PDO('mysql:host=localhost;port=3306;dbname=livro','root','root');

try
{
    //executa instruções sql
    $conn->exec("INSERT INTO famosos (codigo,nome) VALUES(1,'John LennoN')");
    //$conn->query("INSERT INTO famosos (codigo,nome) VALUES(2,'John LennoN')");


}catch(PDOException $e)
{
    //caso ocorra erros
    print "Erro: " . $e->getMessage() . PHP_EOL;


}

