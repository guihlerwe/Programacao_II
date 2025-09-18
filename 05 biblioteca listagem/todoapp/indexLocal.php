<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - Locais</title>
</head>
<body>
    <?php
        function Recuperar(){
            $connection = require("dbfactory.php");
            $sql = "SELECT id, nome, cep, endereco FROM local";

            $result = $connection->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {  
                $rowid = "'_" . $row["id"] . "'";       
                $nome = $row["nome"];
                $cep = $row["cep"];
                $endereco = $row["endereco"];
                echo "<tr id = "."_".$row["id"].">"                        
                         . "<td>"
                           . "<input type='text' class='valor-nome' value='$nome'/>"                         
                        . "</td>"
                         . "<td>"
                           . "<input type='text' class='valor-cep' value='$cep'/>"                         
                        . "</td>"
                         . "<td>"
                           . "<input type='text' class='valor-endereco' value='$endereco'/>"                         
                        . "</td>"
                        . "<td>"
                        . "<button onclick=removerLocal($rowid)>Remover</button>"
                        ."</td>"
                        . "<td>"
                        . "<button onclick=atualizarLocal($rowid)>Atualizar</button>"
                        ."</td>"                                           
                    ."</tr>";
            }
            echo "</table>";
            $connection->close();
        }
            
        Recuperar();
    ?>
    <form method="post" id="form-local">
        <label for="local">Cadastros de Local</label>
        <input name="nome" id="nome" placeholder="nome" type="text" required>
        <input name="cep" id="cep" placeholder="cep" type="text" required>
        <input name="endereco" id="endereco" placeholder="endereco" type="text" required>
        <button type="submit">Gravar</button>
    </form> 
</body>
<script src="index.js"></script>
</html>