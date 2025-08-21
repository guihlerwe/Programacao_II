<?php 
header('Content-Type: application/json');
function Salvar($nome, $cpf, $endereco){
    $connection = require("dbfactory.php");                        
    if ($connection -> 
        query("INSERT INTO pessoa (nome, cpf, endereco) VALUES ('$nome', '$cpf', '$endereco')")) {                 
        echo json_encode(['success' => 'Pessoa salva com sucesso']);
    } else {
        echo json_encode(['error' => 'Erro ao salvar pessoa']);
    }
    $connection -> close();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = json_decode(file_get_contents('php://input', true));    
    if(!empty($postData->nome)){
        Salvar($postData->nome, $postData->cpf, $postData->endereco);
    } else {
        echo json_encode(['error' => 'Nome é obrigatório']);
    }               
}
else {
    echo json_encode(['error' => 'Método inválido']);
}
?>