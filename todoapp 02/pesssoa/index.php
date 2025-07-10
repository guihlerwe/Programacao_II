<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <?php
        function Atualizar($idpessoa, $nome, $cpf, $endereco){
            $connection = require("dbfactory.php");                        
            if ($connection -> 
                query(@"UPDATE todo SET description = '$pessoa' WHERE idpessoa = '$idpessoa'")) {                 
            }
            if ($connection -> 
                query(@"UPDATE todo SET description = '$pessoa' WHERE nome = '$nome'")) {                 
            }if ($connection -> 
                query(@"UPDATE todo SET description = '$pessoa' WHERE cpf = '$cpf'")) {                 
            }if ($connection -> 
                query(@"UPDATE todo SET description = '$pessoa' WHERE endereco = '$endereco'")) {                 
            }
            $connection -> close();
        }
        function Salvar($idpessoa, $nome, $cpf, $endereco){
            $connection = require("dbfactory.php");  
            if ($connection -> 
                query(@"INSERT INTO pessoa (idpessoa) VALUES ('$idpessoa');")) {                 
            }                      
            if ($connection -> 
                query(@"INSERT INTO pessoa (nome) VALUES ('$nome');")) {                 
            }
            if ($connection -> 
                query(@"INSERT INTO pessoa (cpf) VALUES ('$cpf');")) {                 
            }
            if ($connection -> 
                query(@"INSERT INTO pessoa (endereco) VALUES ('$endereco');")) {                 
            }
            $connection -> close();
        }
        function Recuperar(){
            $connection = require("dbfactory.php");
            $sql = "SELECT idpessoa, description FROM pessoa";

            $result = $mysqli->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {           
                echo "<div>"; 
                echo "<tr>"                          
                        . "<td hidden>".$row["idpessoa"]."</td>"
                        . "<td>".$row["nome"]."</td>"
                        . "<td>".$row["cpf"]."</td>"
                        . "<td>".$row["endereco"]."</td>"

                    ."</tr>";
                echo "</div>";
            }
            echo "</table>";
        }      
        
        //NOME
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = htmlspecialchars($_POST['nome']); 
            if(!empty($nome)){
                Salvar($nome);
            }           
        } 
        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            $nome = htmlspecialchars($_POST['nome']); 
            if(!empty($nome)){
                Atualizar($nome);
            }           
        } 
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $nome = htmlspecialchars($_POST['nome']); 
            if(!empty($nome)){
                //Atualizar($description);
            }           
        }  

        //CPF
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cpf = htmlspecialchars($_POST['cpf']); 
            if(!empty($cpf)){
                Salvar($cpf);
            }           
        } 
        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            $nome = htmlspecialchars($_POST['cpf']); 
            if(!empty($cpf)){
                Atualizar($cpf);
            }           
        } 
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $nome = htmlspecialchars($_POST['cpf']); 
            if(!empty($cpf)){
                //Atualizar($description);
            }           
        }    

        //ENDERECO
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $endereco = htmlspecialchars($_POST['endereco']); 
            if(!empty($endereco)){
                Salvar($endereco);
            }           
        } 
        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            $endereco = htmlspecialchars($_POST['endereco']); 
            if(!empty($endereco)){
                Atualizar($endereco);
            }           
        } 
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $endereco = htmlspecialchars($_POST['endereco']); 
            if(!empty($endereco)){
                //Atualizar($description);
            }           
        }  
        Recuperar();        
    ?>
    <form method="post">
        <label for="todo-description">Descrição da tarefa:</label>
        <input name="description" id="todo-description" type="text">
        <button type="submit">Salvar</button>
    </form> 
</body>
<script src="/js/index.js"></script>
</html>