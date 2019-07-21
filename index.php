<?php
	include('controller/funcoes.php');
	include('controller/avisos.php');
	include('model/conecta.php');

	$clientes = listaClientes($db);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">

	<title>Página principal</title>
</head>
<body>

	<div class="menu">
		<ul>
			<li><a href="#">Listar Clientes</a></li>
			<li><a href="view/formulario-cadastra-cliente.php">Cadastrar cliente</a></li>
			<li><a href="view/formulario-cadastra-grupo.php">Cadastrar grupo</a></li>
			<li><a href="view/lista-clientes-inativos.php">Clientes inativos</a></li>
		</ul>
	</div>

	<div class="titulo">
		<h2>Lista de clientes ativos</h2>
	</div>

	<?php
	if(!empty($_GET)) {
		$aviso = $_GET['alterado'];
		$avisos = aviso($aviso);
		
		if($avisos[0] == 0){
			?>
			<div class="alert alert-success titulo">
			<?php
				echo $avisos[1];
			?>
			</div>
			<?php
		}
		else {
			?>
			<div class="alert alert-danger titulo">
			<?php
				echo $avisos[1];
			?>
			</div>
			<?php
		}
	}
	?>

	<div class="corpo">
		<div class="container">
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Cliente</th>
						<th scope="col">Telefone</th>
						<th scope="col">E-mail</th>
						<th scope="col">Grupo do cliente</th>
						<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($clientes as $cliente) {
				?>
					<tr>
						<td><?=($cliente['nome'])?></td>
						<td><?=$cliente['telefone']?></td>
						<td><?=$cliente['email']?></td>
						<td><?=$cliente['nome_grupo']?></td>
						<td><a class="btn btn-primary" href="view/formulario-altera-cliente.php?id=<?=$cliente['id']?>">Alterar</a>
							<a class="btn btn-danger" href="controller/teste.php?id=<?=$cliente['id']?>">Excluir</a>
						</td>
					</tr>
				<?php
				}//fim foreach
				?>
				</tbody>
			</table>
		</div>		
	</div>
	
</body>
</html>