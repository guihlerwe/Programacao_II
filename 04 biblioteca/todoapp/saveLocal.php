<?php
header('Content-Type: application/json');

function Salvar($nome, $cep, $endereco){
    $connection = require("dbfactory.php");                        
    $sql = "INSERT INTO local (nome, cep, endereco) VALUES ('$nome', '$cep', '$endereco')";
    
    if ($connection->query($sql)) {                 
        echo json_encode(['success' => true, 'message' => 'Local salvo com sucesso']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao salvar: ' . $connection->error]);
    }
    $connection->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = json_decode(file_get_contents('php://input'), true);
    
    if(!empty($postData['nome']) && !empty($postData['cep']) && !empty($postData['endereco'])){
        Salvar($postData['nome'], $postData['cep'], $postData['endereco']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Dados incompletos']);
    }        
} else {
    echo json_encode(['error' => 'Método não permitido']);
}
?>