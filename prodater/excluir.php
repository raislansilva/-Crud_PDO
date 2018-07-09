<?php
 
require_once("conexao.php");//Chama o arquivo de conexão com o banco de dados

$id = $_GET["id"]; //Pega o ID da url e armazena em uma variável

$sql = "DELETE FROM cliente WHERE id =:id"; //Instrução sql
$query =$con->prepare($sql);//prepara a variável da instrução sql
//Executa a instrução preparada
$query->execute(array(':id'=> $id));

header("Location: index.php"); //Redireciona para pagina index.php





?>