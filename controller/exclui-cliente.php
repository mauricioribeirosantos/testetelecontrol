<?php
	include('../view/cabecalho.php');
	include('../model/conecta.php');
	include('funcoes.php');
?>

<!--Modal para exclusão-->
<div class="modal fade" id="modalExclui" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletar">
					<h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="motivo">Motivo</label>
								<input type="text" class="form-control" name="motivo" id="motivo" required>
								<input type="hidden" name="id" value="<?=$cliente['id']?>">
							</div>
						</div>
					</div>
					Deseja realmente excluir este cliente?
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Ok</button>
					</form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	

	<?php
	if(!empty($_GET)){
		$id = $_GET['id'];
		if($id != "") {
			session_start();
			$_SESSION['id'] = $id;
			?>
			<script>
			$(document).ready(function(){
				$('#modalExclui').modal('show');
			});
			</script>
		<?php
		}
	}

	if(!empty($_POST)) {
		session_start();
		$id = $_SESSION['id'];
		$motivo = $_POST['motivo'];
		if(inativaCliente($db, $id, $motivo)) {
			header('Location: ../index.php?alterado=2');
		}
		else {
			header('Location: ../index.php?alterado=3');
		}
	}
	?>

	</body>
</html>