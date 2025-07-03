<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cacule🐱‍🏍</h1>
    <form action="somar.php" method="GET">
        <label for= "nome">n1</label> 
        <input type= "text" name = "n1" id = "n1">
        <br>
        <label for= "nome">n2</label> 
        <input type= "text" name = "n2" id = "n2">
        <button type="submit">somar</button>
    </form>

    <form action="subtrair.php" method="GET">
        <label for= "nome">n3</label> 
        <input type= "text" name = "nu3" id = "nu3">
        <br>
        <label for= "nome">n4</label> 
        <input type= "text" name = "nu4" id = "nu4">
        <button type="submit">subtrair</button>
    </form>

    <form action="multiplicar.php" method="GET">
        <label for= "nome">n5</label> 
        <input type= "text" name = "nu5" id = "nu5">
        <br>
        <label for= "nome">n6</label> 
        <input type= "text" name = "nu6" id = "nu6">
        <button type="submit">multiplicar</button>
    </form>

    <form action="dividir.php" method="POST">
        <label for= "nome">nu7</label> 
        <input type= "text" name = "nu7" id = "nu7">
        <br>
        <label for= "nome">nu8</label> 
        <input type= "text" name = "nu8" id = "nu8">
        <button type="submit">dividir</button>
    </form>

</body>
</html>