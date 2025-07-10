<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <?php
        function Atualizar($idTodo, $description){
            $connection = require("dbfactory.php");                        
            if ($connection -> 
                query(@"UPDATE todo SET description = '$todo' WHERE idTodo = '$idTodo'")) {                 
            }
            $connection -> close();
        }
        function Salvar($todo){
            $connection = require("dbfactory.php");                        
            if ($connection -> 
                query(@"INSERT INTO todo (description) VALUES ('$todo');")) {                 
            }
            $connection -> close();
        }
        function Recuperar(){
            $connection = require("dbfactory.php");
            $sql = "SELECT idtodo, description FROM todo";

            $result = $mysqli->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {           
                echo "<div>"; 
                echo "<tr>"                          
                        . "<td hidden>".$row["idtodo"]."</td>"
                        . "<td>".$row["description"]."</td>"
                    ."</tr>";
                echo "</div>";
            }
            echo "</table>";
        }      

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $description = htmlspecialchars($_POST['description']); 
            if(!empty($description)){
                Salvar($description);
            }           
        } 
        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            $description = htmlspecialchars($_POST['description']); 
            if(!empty($description)){
                Atualizar($description);
            }           
        } 
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $description = htmlspecialchars($_POST['description']); 
            if(!empty($description)){
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