<?php

	include('../model/conecta.php');
	include('funcoes.php');

	$grupo = $_POST['grupo'];
	
	if(!empty($_POST['ativo'])) {
		$ativo = $_POST['ativo'];
	}
	else {
		$ativo = 0;
	}

	if(cadastraGrupo($db, $grupo, $ativo)) {
		header('Location: ../index.php?alterado=6');
	}
	else{
		header('Location: ../index.php?alterado=7');
	}

