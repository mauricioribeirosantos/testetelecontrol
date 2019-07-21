<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilos.css">

	<title>Telecontrol</title>
</head>
<body>

	<div class="menu">
		<ul>
			<li><a href="../index.php">Listar Clientes</a></li>
			<li><a href="formulario-cadastra-cliente.php">Cadastrar cliente</a></li>
			<li><a href="formulario-cadastra-grupo.php">Cadastrar grupo</a></li>
			<li><a href="lista-clientes-inativos.php">Clientes inativos</a></li>
		</ul>
	</div>

	<div class="busca">
		<div class="container">
		<h5 class="titulo">Buscar cliente</h5>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-6">
						<label for="buscaNome">Nome</label>
						<input type="text" class="form-control" name="buscaNome" id="buscaNome">
					</div>
					<div class="col col-sm-2">
						<label for="buscaTelefone">Telefone</label>
						<input type="text" class="form-control" name="buscaTelefone" id="buscaTelefone">
					</div>
					<div class="col col-sm-2">
						<label for="buscaGrupo">Grupo</label>
						<select class="form-control" name="buscaGrupo">
							<option value=""></option>
							<?php
							foreach($grupos as $grupo){
							?>
							<option><?=$grupo['nome_grupo']?></option>
							<?php
							}//fim foreach
							?>
						</select>
					</div>
				</div>
			</div>
			<button class="btn btn-primary">Buscar</button>
		</form>
	</div>
	</div>