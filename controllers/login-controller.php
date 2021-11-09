<?php
	require_once("busca-usuario.php");
	require_once("logica-usuario");

	if ($usuario == null) {
		$_SESSION['danger'] = "E-mail ou senha incorretos";
		header("Location: ../login.php"); //usuário e senha incorretos, não loga no sistema
	} else {
		$_SESSION['success'] = "Seja bem-vindo ao sistema de doações!";
		criaCookie($usuario["email"]);
		header("Location: ../logado.php"); //se corretos loga no sistema na tela padrão para todos.
	}
	
?>