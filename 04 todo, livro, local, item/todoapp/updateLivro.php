<?php
header('Content-Type: application/json');
//quando for uma requisição com verbo do tipo "PUT"
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {   
    $connection = require("dbfactory.php");
    //captura os dados de entrada da requisição e transforma em objeto no PHP
    $putData = json_decode(file_get_contents('php://input',true));
    
    // Verifica se é atualização de Livro
    if(isset($putData->descricao)) {
        // Atualização de LIVRO
        $id = $putData->id;
        $descricaoNova = $putData->descricao;
        $tituloNovo = $putData->titulo;
        $autorNovo = $putData->autor;
        $sql = "UPDATE livro SET descricao = '$descricaoNova', titulo = '$tituloNovo', autor = '$autorNovo' WHERE id = $id";
        if ($connection->query($sql)) {
            echo json_encode(['success' => 'livro atualizado com sucesso', 'data' => $putData]);
        } else {
            echo json_encode(['error' => 'Erro ao atualizar livro']);
        }
    } else {
        echo json_encode(['error' => 'Dados insuficientes para atualizar livro']);
    }
    $connection->close();
} else {
    echo json_encode(['error' => 'Método inválido']);
}
?>