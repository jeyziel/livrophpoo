<?php
require ('../../config.php');

$Conn = mysqli_connect('127.0.1.1','root','root','livro');

if (mysqli_connect_errno($Conn)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}

$Query = "SELECT * FROM famosos";

$Result = mysqli_query($Conn,$Query);

echo date('H:i:s'). '<br>';




if($Result){
  while  ($row = mysqli_fetch_assoc($Result)):
  

      echo $row['codigo'] . '-' . $row['nome'] . "<br>\n";
   endwhile;

}













