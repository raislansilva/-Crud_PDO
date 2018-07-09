<?php
require_once("conexao.php"); // Chama o arquivo de conexão com o banco de dados

if(isset($_POST['salvar'])){ // Verifica se a Variável está configurada
	extract($_POST);

	$erros = array();

	if(empty($nome) || empty($cpf)|| empty($endereco)){
		if(empty($nome)){
			$erros['nome'] = "Campo Obrigatório";
		}

		if(empty($cpf)){
			$erros['cpf'] = "Campo Obrigatório";
		}

		if(empty($endereco)){
			$erros['endereco'] = "Campo Obrigatório";
		}

		if(strlen($cpf)!=14){
			$erros['cpf2'] = "CPF Inválido";
		}
	}elseif(strlen($cpf)!=14){
		$erros['cpf2'] = "CPF Inválido";

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

<!DOCTYPE html>
<html>
<head>
	<title>Crud_Prodater</title>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.mask.min.js"></script>
	<script src="../bootstrap.bundle.min.js/ bootstrap.bundle.js"></script>
	<link href="css/estilo.css" rel="stylesheet">
	<script type="text/javascript">
		function f1(){
			alert("Cadastrado com Sucesso");
		}

		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})

		$(document).ready(function(){
			$('#cpf').mask('###.###.###-##');
		});
	</script>
</head>
<body>
	<h4>Dados Pessoais</h4>
	<div class="principal">
		<form action="create.php" method="POST" name="form1"><!-- Inicio do Formulário -->
			<div class="form-group">
				<label>Nome Compeleto</label>
				<input class="form-control" type="text" name="nome" id="nome" placeholder="Nome Completo" >
				<?php
				if(isset($erros['nome'])){
					echo "<div class='error'>".$erros['nome']."</div>";
					unset($erros['nome']);
				}

				?>
				
			</div>

			<div class="form-group">
				<label>CPF</label>
				<input class="form-control" type="text " name="cpf" id="cpf" placeholder="" >
				<?php

				if(isset($erros['cpf'])){
					echo "<div class='error'>".$erros['cpf']."</div>";
					unset($erros['cpf']);
				}elseif(isset($erros['cpf2'])){
					echo "<div class='error'>".$erros['cpf2']."</div>";
					unset($erros['cpf2']);
				}


				?> 


			</div>

			<div class="form-group">
				<label>Endereço</label>
				<input class="form-control" type="text" id="endereco" name="endereco">
				<?php
				if(isset($erros['endereco'])){
					echo "<div class='error'>".$erros['endereco']."</div>";
					unset($erros['endereco']);
				}

				?>

			</div>

			<div>
				<input  class="btn btn-primary" type="submit" name="salvar" value="Salvar" title="Salvar">
				<button  class="btn btn-success" title="Listar"><a href="index.php">Listar</a></button>
			</div>


		</form><!-- Fim do Formulário   -->
	</div>		

</body>
</html>