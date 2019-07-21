<?php

	include('cabecalho.php');
	include('../model/conecta.php');
	include('../controller/funcoes.php');

	$inativos = listaClientesInativos($db);

?>

<div class="titulo">
	<h2>Lista de clientes inativos</h2>
</div>

<div class="corpo">
	<div class="container">
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Telefone</th>
					<th scope="col">E-mail</th>
					<th scope="col">Grupo</th>
					<th scope="col">Motivo</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($inativos as $inativo){
				?>
				<tr>
					<td scope="row"><?=$inativo['nome']?></td>
					<td><?=$inativo['telefone']?></td>
					<td><?=$inativo['email']?></td>
					<td><?=$inativo['nome_grupo']?></td>
					<td><?=substr($inativo['justificativa'],0,30)?></td>
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

