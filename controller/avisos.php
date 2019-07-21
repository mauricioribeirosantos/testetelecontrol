<?php

	function aviso($aviso) {
		switch ($aviso) {
			case 0:
					$tipo = array(0, "Cliente alterado com sucesso.");
					return $tipo;
			case 1:
					$tipo = array(1, "Erro ao tentar alterar o cliente!");
					return $tipo;
			case 2:
					$tipo = array(0, "Cliente excluído com sucesso.");
					return $tipo;
			case 3:
					$tipo = array(1, "Erro ao tentar excluir este cliente!");
					return $tipo;
			case 4:
					$tipo = array(0, "Cliente cadastrado com sucesso.");
					return $tipo;
			case 5:
					$tipo = array(1, "Erro ao cadastrar o cliente!");
					return $tipo;
			case 6:
					$tipo = array(0, "Grupo cadastrado com sucesso.");
					return $tipo;
			case 7:
					$tipo = array(1, "Erro ao cadastrar o grupo!");
					return $tipo;
		}
	}