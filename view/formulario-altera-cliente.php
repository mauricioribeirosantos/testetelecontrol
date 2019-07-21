<?php
	include('cabecalho.php');
	include('../model/conecta.php');
	include('../controller/funcoes.php');

	if(!empty($_GET)) {
		$id = $_GET['id'];
		$grupos = listaGrupos($db);
		$cliente = retornaCliente($db, $id);
	}

	//$grupos = listaGrupos($db);
	//$clientes = listaClientes($)
?>

<div class="formulario">
	<div class="container">
		<form action="../controller/altera-cliente.php" method="POST">
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-6">
						<input type="hidden" name="id" value="<?=$cliente['id']?>">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" name="nome" id="nome" value="<?=utf8_encode($cliente['nome'])?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-6">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email" id="email" value="<?=$cliente['email']?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-3">
						<label for="telefone">Telefone</label>
						<input type="text" class="form-control" name="telefone" id="telefone" value="<?=$cliente['telefone']?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-6">
						<label for="grupo">Grupo</label>
						<select name="grupo">
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
			<button type="submit" class="btn btn-warning">Gravar</button>
			<a class="btn btn-secondary" href="../index.php">Voltar</a>
		</form>
	</div>
</div>
</body>
</html>