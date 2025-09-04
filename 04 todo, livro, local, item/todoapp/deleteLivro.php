<?php
// Check if the request method is DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {    
    $id = $_GET['Id'] ?? null;    
    if ($id !== null) {
        $connection = require("dbfactory.php");
        $sql = @"DELETE FROM livro WHERE Id = $id"; 
        $connection->query($sql);
        $connection -> close();        
    }    
} else {
    echo "This script only handles DELETE requests.";
}
?>