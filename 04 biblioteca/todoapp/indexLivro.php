<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - Livros</title>
</head>
<body>
    <?php
        function Recuperar(){
            $connection = require("dbfactory.php");
            $sql = "SELECT id, descricao, titulo, autor FROM livro";

            $result = $connection->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {  
                $rowid = "'_" . $row["id"] . "'";       
                $descricao = $row["descricao"];
                $titulo = $row["titulo"];
                $autor = $row["autor"];
                echo "<tr id = "."_".$row["id"].">"                        
                         . "<td>"
                           . "<input type='text' class='valor-descricao' value='$descricao'/>"                         
                        . "</td>"
                         . "<td>"
                           . "<input type='text' class='valor-titulo' value='$titulo'/>"                         
                        . "</td>"
                         . "<td>"
                           . "<input type='text' class='valor-autor' value='$autor'/>"                         
                        . "</td>"
                        . "<td>"
                        . "<button onclick=removerLivro($rowid)>Remover</button>"
                        ."</td>"
                        . "<td>"
                        . "<button onclick=atualizarLivro($rowid)>Atualizar</button>"
                        ."</td>"                                           
                    ."</tr>";
            }
            echo "</table>";
            $connection->close();
        }
            
        Recuperar();
    ?>
    <form method="post" id="form-livro">
        <label for="Livro">Cadastros de Livros</label>
        <input name="descricao" id="descricao" placeholder="descricao" type="text" required>
        <input name="titulo" id="titulo" placeholder="titulo" type="text" required>
        <input name="autor" id="autor" placeholder="autor" type="text" required>
        <button type="submit">Gravar</button>
    </form> 
</body>
<script src="index.js"></script>
</html>