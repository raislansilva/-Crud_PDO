<?php
require_once("conexao.php"); // Chama o arquivo de conexão com o banco de dados

if(isset($_POST['editar'])){ // Verifica se a Variável está configurada
	extract($_POST);
	
    // Armazena a instrução sql na variàvel $sql
	$sql = (" UPDATE cliente SET nomeCliente =:nome,cpfCliente=:cpf,enderecoCliente=:endereco WHERE id = :id");
	$query = $con->prepare($sql);//prepara a variável  de instrução

     //Liga um parametro a uma variável especifica
	$query->bindparam(':id', $id); 
	$query->bindparam(':nome', $nome);
	$query->bindparam(':cpf', $cpf);
	$query->bindparam(':endereco', $endereco);
	//Executa a instrução preparada
	$query->execute();

    //Redireciona para a pagina create.php
	header("Location: index.php");
}

?>

