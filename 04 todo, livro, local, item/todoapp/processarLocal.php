
$connection = require("dbfactory.php");

$descricao = $_POST['description'];
//Insert
if ($connection -> 
  query(@"INSERT INTO todo (description) VALUES ('$descricao');")) { 
  echo "Inserido com sucesso.";
}

$connection -> close();
?>