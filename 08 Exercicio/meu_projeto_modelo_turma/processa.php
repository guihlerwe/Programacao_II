<?php include 'includes/header.php';
if(isset($_POST['nome'])){
    $nome = htmlspecialchars($_POST['nome']);
    echo "<h2>Olá, $nome!</h2>";
} else {
    echo "<h2>Nenhum nome enviado.</h2>";
}
include 'includes/footer.php'; ?>