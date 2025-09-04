<?php
header('Content-Type: application/json');
//quando for uma requisição com verbo do tipo "PUT"
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {   
    $connection = require("dbfactory.php");
    //captura os dados de entrada da requisição e transforma em objeto no PHP
    $putData = json_decode(file_get_contents('php://input',true));
    
    // Verifica se é atualização de TODO ou PESSOA
    if(isset($putData->descricao)) {
        // Atualização de TODO
        $id = $putData->id;
        $descricaoNova = $putData->descricao;
        $sql = "UPDATE todo SET description = '$descricaoNova' WHERE idtodo = $id";
        if ($connection->query($sql)) {
            echo json_encode(['success' => 'Todo atualizado com sucesso', 'data' => $putData]);
        } else {
            echo json_encode(['error' => 'Erro ao atualizar todo']);
        }
    } else {
        // Atualização de PESSOA
        $id = $putData->id;
        $nome = $putData->nome;
        $cpf = $putData->cpf;
        $endereco = $putData->endereco;
        $sql = "UPDATE pessoa SET nome = '$nome', cpf = '$cpf', endereco = '$endereco' WHERE idpessoa = $id";
        if ($connection->query($sql)) {
            echo json_encode(['success' => 'Pessoa atualizada com sucesso', 'data' => $putData]);
        } else {
            echo json_encode(['error' => 'Erro ao atualizar pessoa']);
        }
    }
    $connection->close();
} else {
    echo json_encode(['error' => 'Método inválido']);
}
?>