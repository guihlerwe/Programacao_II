<?php
require_once 'dbfactory.php';

$conn = getConnection();
$sql = "SELECT * FROM livros"; // Ajuste o nome da tabela se necessário
$result = $conn->query($sql);

$livros = [];
while ($row = $result->fetch_assoc()) {
    $livros[] = $row;
}

header('Content-Type: application/json');
echo json_encode($livros);
?>