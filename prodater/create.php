<?php

session_start();

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
		
	</script>
</head>
<body>
	<h4>Dados Pessoais</h4>
	<div class="principal">
		<form action="store.php" method="POST" name="form1"><!-- Inicio do Formulário -->
			<div class="form-group">
				<label>Nome Compeleto</label>
				<input class="form-control" type="text" name="nome" id="nome" placeholder="Nome Completo" >
				<?php
				if(isset($_SESSION['nome'])){
					echo "<div class='error'>".$_SESSION['nome']."</div>";
					unset($_SESSION['nome']);
				}

				?>
				
			</div>

			<div class="form-group">
				<label>CPF</label>
				<input class="form-control" type="text " name="cpf" id="cpf" placeholder="" >
				<?php

				if(isset($_SESSION['cpf'])){
					echo "<div class='error'>".$_SESSION['cpf']."</div>";
					unset($_SESSION['cpf']);
				}elseif(isset($_SESSION['cpf2'])){
					echo "<div class='error'>".$_SESSION['cpf2']."</div>";
					unset($_SESSION['cpf2']);
				}


				?> 


			</div>

			<div class="form-group">
				<label>Endereço</label>
				<input class="form-control" type="text" id="endereco" name="endereco">
				<?php
				if(isset($_SESSION['endereco'])){
					echo "<div class='error'>".$_SESSION['endereco']."</div>";
					unset($_SESSION['endereco']);
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