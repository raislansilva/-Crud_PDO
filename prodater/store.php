<?php
session_start();
require_once("conexao.php");
 // Chama o arquivo de conexão com o banco de dados

if(isset($_POST['salvar'])){ // Verifica se a Variável está configurada
	extract($_POST);

	$_SESSION["erros"] = array();

	if(empty($nome) || empty($cpf)|| empty($endereco)){
		if(empty($nome)){
			$_SESSION['nome'] = "Campo Obrigatório";
		}

		if(empty($cpf)){
			$_SESSION['cpf'] = "Campo Obrigatório";
		}

		if(empty($endereco)){
			$_SESSION['endereco'] = "Campo Obrigatório";
			header("Location: create.php"); //Redireciona para a pagina create
		}

		if(strlen($cpf)!=14){
			$_SESSION['cpf2'] = "CPF Inválido";
			header("Location: create.php"); //Redireciona para a pagina create
			
		}
		
	}elseif(strlen($cpf)!=14){
		$_SESSION['cpf2'] = "CPF Inválido";
		header("Location: create.php"); //Redireciona para a pagina create

	}else{
		$sql = "INSERT INTO cliente(nomeCliente,cpfCliente,enderecoCliente) VALUES (:nome,:cpf,:endereco)"; // Armazena a consulta sql na variàvel $sql
	    $query =$con->prepare($sql);//prepara a variável de consulta

        //Liga um parametro a uma variável especifica
	    $query->bindparam(':nome',$nome); 
	    $query->bindparam(':cpf', $cpf);
	    $query->bindparam(':endereco',$endereco);
        //Executa a instrução preparada
	    $query->execute();

	    header("Location: create.php"); //Redireciona para a pagina create
	    
	}


}


?>