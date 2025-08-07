<?php

$connection = require("conectar.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];


//Insert
if ($connection -> 
  query(@"INSERT INTO pessoa (nome, cpf, endereco) VALUES ('$descricao');")) { 
  echo "Inserido com sucesso.";
}

$connection -> close();
?>