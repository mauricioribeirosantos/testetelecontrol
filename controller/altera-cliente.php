<?php

	include('../model/conecta.php');
	include('funcoes.php');

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$grupo = $_POST['grupo'];

	//conversão de valor da id para inteiro, mysqli retorna valor tipo string
	$grupo = retornaGrupo($db, $grupo);
	$grupo = intval($grupo['id_grupo']);
	
	if(alteraCliente($db, $id, $nome, $email, $telefone, $grupo)) {
		header('Location: ../index.php?alterado=0');
	}
	else{
		header("Location: ../index.php?alterado=1");
	}
	