<?php
	session_start();

	function usuarioEstaLogado()
	{
		//Verifico se o usuário fez login
		return isset($_SESSION["usuario_logado"]);
	}

	function verificaUsuario()
	{
		//Nesse if, verifico se o usuário tem permissão de acessar essa página
		if (!usuarioEstaLogado()) {
			$_SESSION['danger'] = "Você não tem permissão para acessar essa página!";
			header("Location: index.php");
			die();
		}
	}

	function verificaUsuarioForControllers()
	{
		//Nesse if, verifico se o usuário tem permissão de acessar essa página
		if (!usuarioEstaLogado()) {
			$_SESSION['danger'] = "Você não tem permissão para acessar essa página!";
			header("Location: ../index.php");
			die();
		}
	}

	function recebeNivel($nivel)
	{
		return $nivel;
	}

	function verificaNivelAcesso()
	{
		//Nesse if verifico se o usuário tem permissão de nível de acesso
		if (recebeNivel() != 1 or recebeNivel() != 2) {
			# Caso não tenha nível de acesso 1 ou 2, é redirecionado para a tela de cadastro de doacões
			$_SESSION['danger'] = "Você não tem permissão para acessar essa página!";
			header("Location: ../index.php");
			die();
		}
		
	}

	function usuario()
	{
		//Verifica usuário que está logado
		return $_SESSION['usuario_logado'];
	}

	function criaCookie($email)
	{
		$_SESSION['usuario_logado'] = $email;
	}

	function logout()
	{
		session_destroy();
		header("Location: ../index.php");
		die();
	}
?>