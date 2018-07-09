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

<?php
$id= $_GET['id']; //Pega o id da url e armazena na variável

//Consulta sql
$sql = "SELECT * FROM cliente WHERE id=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));

//Laço de repetição que armazena os valores do formulário em uma variável
while($row = $query->fetch(PDO::FETCH_ASSOC))
	{
		$nome = $row['nomeCliente'];
		$cpf = $row['cpfCliente'];
		$endereco = $row['enderecoCliente'];
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
		<link href="css/estilo.css" rel="stylesheet">
		<script type="text/javascript">
			function f2(){
				alert("Edição feita com sucesso");
			}

			$(document).ready(function(){
				$('#cpf').mask('###.###.###-##');
			});
		</script>
	</head>
	<body>
		<h4>Alterar Dados</h4>
		<div class="principal">
			<form action="" method="POST" name="form2"><!-- Inicio do Formulário-->

				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

				<div class="form-group">
					<label>Nome Compeleto</label>
					<input class="form-control" type="text" name="nome" id="nome" value="<?php echo $nome; ?>" placeholder="Nome Completo">
				</div>

				<div class="form-group">
					<label>CPF</label>
					<input class="form-control" type="text " name="cpf" id="cpf" value="<?php echo $cpf; ?>" placeholder="">

				</div>

				<div class="form-group">
					<label>Endereço</label>
					<input class="form-control" type="text" id="endereco" name="endereco" value="<?php echo $endereco; ?>">

				</div>

				<div>
					<input  class="btn btn-primary" type="submit" name="editar" value="Editar" onclick="f2()">
					<button class="btn btn-danger"><a href="index.php">Cancelar</a></button>
				</div>

			</form><!-- Fim do Formuário-->
		</div>		

	</body>
	</html>