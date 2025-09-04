<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <?php
        function Salvar($Local){
            $connection = require("dbfactory.php");                        
            if ($connection -> 
                query("INSERT INTO local (Nome) VALUES ('$local')")) {                 
            }
            $connection -> close();
        }
        function Recuperar(){
            $connection = require("dbfactory.php");
            $sql = "SELECT id, Nome, CEP, Endereco FROM local";

            $result = $connection->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {  
                $rowid = "'_" . $row["id"] . "'";       
                echo "<tr id = "."_".$row["id"].">"                        
                        . "<td>"
                        . "<input type='text' class='valor-Nome' value='".$row["Nome"]."' />"
                        . "</td>"
                        . "<td>"
                        . "<input type='text' class='valor-CEP' value='".$row["CEP"]."' />"
                        . "</td>"
                        . "<input type='text' class='valor-Endereco' value='".$row["Endereco"]."' />"
                        . "</td>"
                        . "<td>"
                        . "<button onclick=atualizarLocal($rowid)>Atualizar</button>"
                        . "</td>"
                        . "<td>"
                        . "<button onclick=removerLocal($rowid)>Remover</button>"
                        ."</td>"                                            
                    ."</tr>";
            }
            echo "</table>";
        }
    ?>
    <form method="post">
        <label for="Local">Local:</label>
        <input name="Nome" id="local-Nome" type="text">
        <input name="CEP" id="local-CEP" type="text">
        <input name="Endereco" id="local-Endereco" type="text">
        <button type="local.submit">Enviar</button>
    </form> 
</body>
<script src="/js/index.js"></script>
</html>