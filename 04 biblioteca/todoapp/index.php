<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <button id = "Livro">
        <a href="indexlivro.php">Livro</a>
    </button>
    <button id = "Local">
        <a href="indexlocal.php">Local</a>
    </button>
</body>
<script src="index.js"></script>
</html>



//design da  pag
<style>
    body{
        display: block;
        text-align:center;
        margin:50%;
        padding:5px;
    }
    a{
        color:white;
        font-weight:bold;
    }
    #Livro{
        background-color: #007bff; /* Blue background */
        color: white; /* White text color */
        text-decoration:none;
        border: none; /* No border */
        padding: 10px 20px; /* Space around the text */
        font-size: 16px; /* Text size */
        cursor: pointer; 
        border-radius: 5em; 
        transition: background-color 0.3s ease; 
    }

    #Livro:hover{
        background-color: #0056b3;
        transform: scale(1.05);
        animation: pulse 1.5s infinite alternate;
    }

    #Local{
        background-color: #ff0000ff; /* Blue background */
        color: white; /* White text color */
        text-decoration:none;
        border: none; /* No border */
        padding: 10px 20px; /* Space around the text */
        font-size: 16px; /* Text size */
        cursor: pointer; 
        border-radius: 5em; 
        transition: background-color 0.3s ease; 
    }

    #Local:hover{
        background-color: #b30000ff;
        transform: scale(1.05);
        animation: pulse 1.5s infinite alternate;
    }


    @keyframes pulse {
    0% {
        transform: scale(8);
        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7); /* Initial shadow state */
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(40, 167, 69, 0); /* Expanded shadow state */
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7); /* Return to initial state */
    }
    }

</style>