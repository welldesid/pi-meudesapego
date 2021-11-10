<?php
	require_once("cabecalho.php");

	if (usuarioEstaLogado()) {
?>
		<p class="alert-success">Você está logado como <?= usuario(); ?></p>
		<h1>Seja bem-vindo ao sistema de doações!</h1>
<?php
	} else {
		header("Location: ../login.php");
	}
	
	require_once("rodape.php");
?>