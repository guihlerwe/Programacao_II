<?php
header('Content-Type: application/json');
//quando for uma requisição com verbo do tipo "PUT"
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {   
    $connection = require("conectar.php");

    //captura os dados de entrada da requisição e transforma em objeto no PHP
    $putData = json_decode(file_get_contents('php://input',true));
    $connection = require("conectar.php");

    $id = $putData->idpessoa;
    $nomeNova = $putData->nome;
    $cpfNova = $putData->cpf;

    $enderecoNova = $putData->endereco;
    $sql = @"update pessoa set nome = '$nomeNova', cpf = '$cpfNova', endereco = '$enderecoNova' where idpessoa = $id";

    if ($connection -> 
        query($sql)) {                 
    }
    $connection -> close();

    //depois de executar a operação, retorna o json enviado    
    $response['body'] = json_encode($putData);
    echo $response['body'];        
} else {
    $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
    echo $response;
}
?>