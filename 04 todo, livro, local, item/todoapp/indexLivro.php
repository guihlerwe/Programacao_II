<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <?php
        function Salvar($todo){
            $connection = require("dbfactory.php");                        
            if ($connection -> 
                query("INSERT INTO Livro (Descricao) VALUES ('$Livro')")) {                 
            }
            $connection -> close();
        }
        function Recuperar(){
            $connection = require("dbfactory.php");
            $sql = "SELECT id, Descricao, Titulo, Autor FROM Livro";

            $result = $connection->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {  
                $rowid = "'_" . $row["id"] . "'";
                $Descricao = "'_" . $row["Descricao"] . "'";
                $Titulo = "'_" . $row["Titulo"] . "'";
                $Autor = "'_" . $row["Autor"] . "'";

                echo "<tr id = "."_".$row["id"].">"                        
                        . "<td>"
                        . "<input type='text' class='valor-Descricao' value='".$row["Descricao"]."' />"
                        . "</td>"
                        . "<td>"
                        . "<input type='text' class='valor-Titulo' value='".$row["Titulo"]."' />"
                        . "</td>"
                        . "<td>"
                        . "<input type='text' class='valor-Autor' value='".$row["Autor"]."' />"
                        . "</td>"
                        . "<td>"
                        . "<button onclick=atualizarLivro($rowid)>Atualizar</button>"
                        . "</td>"
                        . "<td>"
                        . "<button onclick=removerLivro($rowid)>Remover</button>"
                        ."</td>"                                            
                    ."</tr>";
            }
            echo "</table>";
        }
    ?>
    <form method="post">
        <label for="Local">Local</label>
        <input name="Descricao" id="todo-description" type="text">
        <button type="submit">Enviar</button>

        <label for="livro-description">Dados do livro:</label>
        <input name="Descricao" id="livro-Descricao" type="text">
        <input name="Titulo" id="livro-Titulo" type="text">
        <input name="Autor" id="livro-Autor" type="text">
        <button type="livro-submit">Enviar</button>
    </form> 
</body>
<script src="/js/index.js"></script>
</html>