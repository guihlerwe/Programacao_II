<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Projeto PHP</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'menu.php'; ?>
<?php
// filepath: 08 Exercicio/meu_projeto_modelo_turma/dbfactory.php
$mysqli = new mysqli("localhost", "root", "root", "meusistema");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
return $mysqli;
?>