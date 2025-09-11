<?php
header('Content-Type: application/json');

function Salvar($localId, $livroId, $dataEntrada){
            $connection = require("dbfactory.php");                        
            if ($connection -> 
                query(@"INSERT INTO item (localId, livroId, dataEntrada) VALUES ('$localId', '$livroId', '$dataEntrada');")) {                 
            }
            $connection -> close();
        }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $putData = json_decode(file_get_contents('php://input',true));
            $localId = htmlspecialchars($_POST['localId']); 
            $livroId = htmlspecialchars($_POST['livroId']); 
            $dataEntrada = htmlspecialchars($_POST['dataEntrada']);

            if(!empty($localId && $livroId && $dataEntrada)){
                Salvar($localId, $livroId, $dataEntrada);
            }        
        }
else {
    $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
    echo $response;
}
?>