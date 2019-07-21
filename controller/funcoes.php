<?php

	function cadastraCliente($db, $grupo, $nome, $telefone, $email) {
		$query = "INSERT INTO cliente (grupo, nome, telefone, email, ativo) VALUES ({$grupo}, '{$nome}', '{$telefone}', '{$email}', 1)";
		return mysqli_query($db, $query);
	}

	//retorna vários clientes
	function listaClientes($db) {
		$clientes = array();
		$query = mysqli_query($db, "SELECT c.id, c.nome, c.telefone, c.email, g.nome_grupo FROM cliente as c INNER JOIN grupo as g on c.grupo = g.id_grupo WHERE c.ativo = 1");
		while($cliente = mysqli_fetch_assoc($query)) {
			array_push($clientes, $cliente);
		}
		return $clientes;
	}

	function listaClientesInativos($db) {
		$inativos = array();
		$query = mysqli_query($db, "SELECT c.id, c.nome, c.telefone, c.email, g.nome_grupo, c.justificativa FROM cliente as c INNER JOIN grupo as g on c.grupo = g.id_grupo WHERE c.ativo = 0");
		while($inativo = mysqli_fetch_assoc($query)) {
			array_push($inativos, $inativo);
		}
		return $inativos;
	}

	function buscaClienteNome($db, $dados) {
		$clientes = array();
		$query = mysqli_query($db, "SELECT c.id, c.nome, c.telefone, c.email, g.nome_grupo FROM cliente as c INNER JOIN grupo as g on c.grupo = g.id_grupo WHERE c.ativo = 1 {$dados}");
		while($cliente = mysqli_fetch_assoc($query)) {
			array_push($clientes, $cliente);
		}
		return $clientes;
	}

	/*retorna apenas 1 cliente
	function retornaCliente($db, $id) {
		$query = mysqli_query($db, "SELECT c.nome, c.email, c.telefone, g.grupo FROM cliente as c INNER JOIN grupo as g on c.grupo = g.grupo WHERE c.id = {$id}");
		return mysqli_fetch_assoc($query);
	}
	*/

	function retornaCliente($db, $id) {
		$query = mysqli_query($db, "SELECT * FROM cliente WHERE id = '{$id}'");
		return mysqli_fetch_assoc($query);
	}

	function alteraCliente($db, $id, $nome, $email, $telefone, $grupo) {
		$query = "UPDATE cliente SET nome = '{$nome}', email = '{$email}', telefone = '{$telefone}', grupo = '{$grupo}' WHERE id = {$id}";
		return mysqli_query($db, $query);
	}

	function inativaCliente($db, $id, $motivo) {
		$query = "UPDATE cliente SET ativo = 0, justificativa = '{$motivo}' WHERE id = {$id}";
		return mysqli_query($db, $query);
	}

	function cadastraGrupo($db, $grupo, $ativo) {
		$query = "INSERT INTO grupo (nome_grupo, situacao) VALUES ('{$grupo}', {$ativo})";
		return mysqli_query($db, $query);
	}

	function retornaGrupo($db, $grupo) {
		$query = mysqli_query($db, "SELECT id_grupo FROM grupo WHERE nome_grupo = '{$grupo}'");
		return mysqli_fetch_assoc($query);
	}

	function listaGrupos($db) {
		$grupos = array();
		$query = mysqli_query($db, "SELECT * FROM grupo WHERE situacao = 1");
		while($grupo = mysqli_fetch_assoc($query)) {
			array_push($grupos, $grupo);
		}
		return $grupos;
	}

	