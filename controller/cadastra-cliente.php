<?php

	include('../model/conecta.php');
	include('funcoes.php');

	$grupo = $_POST['grupo'];
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];

	$grupo = retornaGrupo($db, $grupo);
	$grupo = intval($grupo['id_grupo']);
	
	if(cadastraCliente($db, $grupo, $nome, $telefone, $email)) {
		header('Location: ../index.php?alterado=4');
	}
	else {
		header('Location: ../index.php?alterado=5');
	}
	