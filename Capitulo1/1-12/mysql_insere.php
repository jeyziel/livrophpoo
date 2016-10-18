<?php

//abre conexao com mysql
$conn = mysqli_connect('127.0.0.1','root','root','livro');

mysqli_query($conn,"INSERT INTO famosos (codigo,nome) VALUES(1,'John Lenno')");
mysqli_query($conn,"INSERT INTO famosos (codigo,nome) VALUES(2,'jeyziel')");
mysqli_query($conn,"INSERT INTO famosos (codigo,nome) VALUES(3,'jeyziel')");
mysqli_query($conn,"INSERT INTO famosos (codigo,nome) VALUES(4,'jeyziell')");

mysqli_close($conn);




