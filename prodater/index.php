<?php

require_once("conexao.php"); // Chama o arquivo de conexão com o banco de dados

$result = $con->query("SELECT * FROM cliente"); //Armazena a consulta em uma variável


?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.mask.min.js"></script>
	<link href="css/estilo.css" rel="stylesheet">
	
</head>
<body>

	<div class="tabela">
		<h3>Dados do Cliente</h3>

		<a href="create.php"><button id="button" class="btn btn-primary">Cadastrar</button></a>


		<table class="table table-bordered table-responsive table-hover"><!--  Tabela HTML  -->
			<tr id="cabecalho">
				<td ><center>Nome</center></td>
				<td style="width: 14%;"><center>CPF</center></td>
				<td style="width: 28%;"><center>Endereço</center></td>
				<td style="width: 18%;"><center>Ações</center></td>

			</tr>

			<?php 
			while($row = $result->fetch(PDO::FETCH_ASSOC)){ // Laço de repetição que irá imprimir o resultado da varaiável de consulta 
				echo "<tr>";
				echo "<td>".$row['nomeCliente']."</td>";
				echo "<td>".$row['cpfCliente']."</td>";
				echo "<td>".$row['enderecoCliente']."</td>";
				echo "<td><a href=\"editar.php?id=$row[id]\"><button class=\"btn btn-warning\">Editar</button></a> <a href=\"excluir.php?id=$row[id]\"><button class=\"btn btn-danger\"  onclick=\"f3()\">Excluir</button></a> </td>";
				echo "</tr>";
			}?>


		</table>



		

	</div>


</body>
</html>