<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {    
    $id = $_GET['id'] ?? null; //pega o id do livro   
    
    if ($id !== null) { //se livro existe
        $connection = require("dbfactory.php");//faz conexao
        $sql = "DELETE FROM livro WHERE id = $id"; //deleta do bd
        
        if ($connection->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Livro removido com sucesso']);//coloca mensagem de sucesso no console
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao remover: ' . $connection->error]); //coloca mensagem de erro no consolecaso conexão nao funcione
        }
        $connection->close();        
    } else {
        echo json_encode(['success' => false, 'message' => 'ID não fornecido']);
        //caso o id não funcione o console recebe mensagem de id nao fornecido
    }    
} else {
    echo json_encode(['error' => 'Método não permitido']); 
    //caso ocorra metodo diferente de delete requerido, exibe metodo. n permitido
}
?>