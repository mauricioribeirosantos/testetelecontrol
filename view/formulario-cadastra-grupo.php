<?php
	include('cabecalho.php');
?>

<div class="titulo">
	<h3>Cadastro de grupo</h3>
</div>

<div class="formulario">
	<div class="container">
		<form action="../controller/cadastra-grupo.php" method="POST">
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-2">
						<label for="grupo">Grupo nome</label>
						<input type="text" class="form-control" name="grupo" id="grupo" required>
					</div>
				</div>
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" name="ativo" id="ativo" value="1">
				<label class="form-check-label" for="ativo">Ativo</label>
			</div>
			<button class="btn btn-success">Cadastrar</button>
			<a class="btn btn-secondary" href="../index.php">Voltar</a>		
		</form>
	</div>
</div>


