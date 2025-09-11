<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {    
    $id = $_GET['id'] ?? null;    
    
    if ($id !== null) {
        $connection = require("dbfactory.php");
        $sql = "DELETE FROM livro WHERE id = $id"; 
        
        if ($connection->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Livro removido com sucesso']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao remover: ' . $connection->error]);
        }
        $connection->close();        
    } else {
        echo json_encode(['success' => false, 'message' => 'ID não fornecido']);
    }    
} else {
    echo json_encode(['error' => 'Método não permitido']);
}
?>