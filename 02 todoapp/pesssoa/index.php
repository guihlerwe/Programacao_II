<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <?php
        function Atualizar($idpessoa, $nome, $cpf, $endereco){
            $connection = require("conectar.php");                        
            if ($connection -> 
                query(@"UPDATE pessoa SET description = '$pessoa' WHERE idpessoa = '$idpessoa'")) {                 
            }
            /*
            if ($connection -> 
                query(@"UPDATE pessoa SET description = '$pessoa' WHERE nome = '$nome'")) {                 
            }if ($connection -> 
                query(@"UPDATE pessoa SET description = '$pessoa' WHERE cpf = '$cpf'")) {                 
            }if ($connection -> 
                query(@"UPDATE pessoa SET description = '$pessoa' WHERE endereco = '$endereco'")) {                 
            }*/
            $connection -> close();
        }

        #SALVAR
        function Salvar($nome, $cpf, $endereco){
            $connection = require("conectar.php");  
            if ($connection -> 
                query(@"INSERT INTO pessoa (nome, cpf, endereco) VALUES ('$nome', '$cpf', '$endereco')")) {                 
            } 
            $connection -> close();
        }


        #"RECUPERAR" mostrar na pagina
        function Recuperar(){
            $connection = require("conectar.php");
            $sql = "SELECT idpessoa, nome, cpf, endereco from pessoa";

            $result = $mysqli->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {     
                $rowid = "'_" . $row["idpessoa"] . "'";       
                $nome = $row["nome"];
                $cpf = $row["cpf"];
                $endereco = $row["endereco"];

                echo "<div>"; 
                echo "<tr id = "."_".$row["idpessoa"].">"                    
                        . "<td>"
                           . @"<input type='text' class = 'valor-nome' value = '$nome'/>"                         
                        . "</td>"
                        . "<td>"
                           . @"<input type='text' class = 'valor-cpf' value = '$cpf'/>"                         
                        . "</td>"
                        . "<td>"
                           . @"<input type='text' class = 'valor-endereco' value = '$endereco'/>"                         
                        . "<td>"
                        . @"<button onclick=atualizarTodo($rowid)>Atualizar</button>"
                        . @"<button onclick=removerTodo($rowid)>Remover</button>"
                        ."</td>"      
                    ."</tr>";
            }
            echo "</table>";
        }      
        
        #VERIFICAR O BD
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = htmlspecialchars($_POST['nome']); 
                $cpf = htmlspecialchars($_POST['cpf']);
                $endereco = htmlspecialchars($_POST['endereco']);
                if(!empty($nome) && !empty($cpf) && !empty($endereco)){
                Salvar($nome, $cpf, $endereco);
                }           
            }
            Recuperar();

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
            Recuperar();        
            }
            if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $idRemover = $_GET['id']; 
            echo "Pegou: ". $idRemover;           
            }

        /*if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $nome = htmlspecialchars($_POST['nome']); 
            $cpf = htmlspecialchars($_POST['cpf']);
            $endereco = htmlspecialchars($_POST['endereco']);
            if(!empty($nome) && !empty($cpf) && !empty($endereco)){
                Recuperar($nome, $cpf, $endereco);
            }           
        }*/
        /*
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $nome = htmlspecialchars($_POST['nome']); 
            $cpf = htmlspecialchars($_POST['cpf']);
            $endereco = htmlspecialchars($_POST['endereco']);
            if(!empty($nome) && !empty($cpf) && !empty($endereco)){
                Recuperar($nome, $cpf, $endereco);
            }           
        } */ 
                
    ?>

    <!--RECEBE DADOS DO USUARIO!-->
    <form method="post">
        <label for="nome">Nome:</label>
        <input name="nome" id="nome" type="text">
        
        <label for="cpf">CPF:</label>
        <input name="cpf" id="cpf" type="text">
        
        <label for="endereco">Endereco:</label>
        <input name="endereco" id="endereco" type="text">
        <button type="submit"> Salvar</button>

    </form> 
</body>
<script src="/js/index.js"></script>
</html>