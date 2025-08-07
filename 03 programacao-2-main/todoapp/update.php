<?php
// Check if the request method is DELETE
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {    
    $rawData = file_get_contents("php://input");
    echo json_decode($rawData,true);
} else {
    echo "This script only handles DELETE requests.";
}
?>