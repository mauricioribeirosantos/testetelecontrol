<?php
	
	include('../model/conecta.php');
	include('../controller/funcoes.php');

	$grupos = listaGrupos($db);
	include('cabecalho-cadastra-cliente.php');
?>

<div class="titulo">
	<h2>Cadastro de cliente</h2>
</div>

<div class="formulario">
	<div class="container">
		<form action="../controller/cadastra-cliente.php" method="POST">
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-6">
						<input type="hidden" name="id" value="<?=$cliente['id']?>">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" name="nome" id="nome" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-6">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email" id="email">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col col-sm-3">
						<label for="telefone">Telefone</label>
						<input type="text" class="form-control" name="telefone">
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
			<button type="submit" class="btn btn-success">Gravar</button>
			<a class="btn btn-secondary" href="../index.php">Voltar</a>
		</form>
	</div>
</div>

<?php
	if(!empty($_POST)) {
		$buscaNome = $_POST['buscaNome'];
		$buscaTelefone = $_POST['buscaTelefone'];
		$buscaGrupo = $_POST['buscaGrupo'];
		$busca = "";

		//dados filtrados != null
		if($buscaNome) {
			$busca .= " AND c.nome = '{$buscaNome}'";
		}
		if($buscaTelefone) {
			$busca .= " AND c.telefone = '{$buscaTelefone}'";
		}
		if($buscaGrupo) {
			$numeroGrupo = retornaGrupo($db, $buscaGrupo);
			$numeroGrupo = intval($numeroGrupo['id_grupo']);
			$busca .= " AND grupo = ".$numeroGrupo;
		}

		$dados = buscaClienteNome($db, $busca);

		if(buscaClienteNome($db, $busca)) {
		?>
		<div class="formulario">
			<div class="container">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Telefone</th>
							<th scope="col">Email</th>
							<th scope="col">Grupo</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($dados as $cliente) {
						?>
						<tr>
							<td scope="col"><?=$cliente['nome']?></td>
							<td><?=$cliente['telefone']?></td>
							<td><?=$cliente['email']?></td>
							<td><?=$cliente['nome_grupo']?></td>
						</tr>
						<?php
						}//fim foreach
						?>
					</tbody>
				</table>
			</div>
		</div>

		<?php
		}
		else {
		?>
			<div class="alert alert-warning aviso">
				Cliente não cadastrado!
			</div>
		<?php
		}//fim else
	}//fim if empty
?>
		
</body>
</html>