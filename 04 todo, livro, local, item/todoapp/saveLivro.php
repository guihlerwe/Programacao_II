<?php 
header('Content-Type: application/json');
function Salvar($Descricao, $titulo, $autor){
    $connection = require("dbfactory.php");                        
    if ($connection -> 
        query("INSERT INTO livro (Descricao, titulo, autor) VALUES ('$Descricao', '$titulo', '$autor')")) {                 
        echo json_encode(['success' => 'Livro salvo com sucesso']);
    } else {
        echo json_encode(['error' => 'Erro ao salvar livro']);
    }
    $connection -> close();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = json_decode(file_get_contents('php://input', true));    
    if(!empty($postData->Descricao)){
        Salvar($postData->Descricao, $postData->titulo, $postData->autor);
    } else {
        echo json_encode(['error' => 'Descricao é obrigatório']);
    }               
}
else {
    echo json_encode(['error' => 'Método inválido']);
}
?>