<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {   
    $connection = require("dbfactory.php");
    $putData = json_decode(file_get_contents('php://input'), true);
    
    $id = $putData['id'];
    $nomeNovo = $putData['nome'];
    $cepNovo = $putData['cep'];
    $enderecoNovo = $putData['endereco'];
    
    $sql = "UPDATE local SET nome = '$nomeNovo', cep = '$cepNovo', endereco = '$enderecoNovo' WHERE id = $id";    
    
    if ($connection->query($sql)) {                 
        echo json_encode(['success' => true, 'message' => 'Local atualizado com sucesso', 'data' => $putData]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar: ' . $connection->error]);
    }
    $connection->close();
} else {
    echo json_encode(['error' => 'Método não permitido']);
}
?>