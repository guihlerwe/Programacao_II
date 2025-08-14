<?php
// Check if the request method is DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {    
    $id = $_GET['id'] ?? null;    
    if ($id !== null) {
        $connection = require("conectar.php");
        $sql = @"DELETE FROM pessoa WHERE Idpessoa = $id"; 
        $connection->query($sql);
        $connection -> close();        
    }    
} else {
    echo "This script only handles DELETE requests.";
}
?>