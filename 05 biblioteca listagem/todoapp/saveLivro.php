<?php
header('Content-Type: application/json');

function Salvar($descricao, $titulo, $autor){
    $connection = require("dbfactory.php");                        
    $sql = "INSERT INTO livro (descricao, titulo, autor) VALUES ('$descricao', '$titulo', '$autor')";
    
    if ($connection->query($sql)) {                 
        echo json_encode(['success' => true, 'message' => 'Livro salvo com sucesso']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao salvar: ' . $connection->error]);
    }
    $connection->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = json_decode(file_get_contents('php://input'), true);
    
    if(!empty($postData['descricao']) && !empty($postData['titulo']) && !empty($postData['autor'])){
        //caso descricao, título e autor não estejam vazios os dados sao salvos
        Salvar($postData['descricao'], $postData['titulo'], $postData['autor']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Dados incompletos']);
        //caso estejam o usuario recebe mensagem de dados imcompletos
    }        
} else {
    echo json_encode(['error' => 'Método não permitido']);
}
?>