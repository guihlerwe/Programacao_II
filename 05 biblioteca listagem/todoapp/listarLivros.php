<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    $id = $_GET['id'] ?? null; //pega o id do livro   
    
    if ($id !== null) { //se livro existe
        $connection = require("dbfactory.php");//faz conexao
        $sql = "GET FROM livro WHERE id = $id"; //LISTA do bd
        
        if ($connection->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Livro LISTADO com sucesso']);//coloca mensagem de sucesso no console
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao LISTAR: ' . $connection->error]); //coloca mensagem de erro no consolecaso conexão nao funcione
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