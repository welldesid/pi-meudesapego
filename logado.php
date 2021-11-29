<?php
	require_once("cabecalho.php");

	if (usuarioEstaLogado()) {
?>
		<div class="card" id="carddoacao">
			<div class="card-header">
				<p class="alert-success">Você está logado como <?= usuario(); ?></p>
			</div>
			<div class="card-body" align="center">
				<div class="container">
					<h1>Seja bem-vindo ao sistema de doações!</h1>
					<div class="card-body">
					<h3>Escolha uma das opções abaixo</h3>
				  		<nav class="navMenu">
					      <a href="logado.php">Início</a>
					      <a href="doacao-formulario.php">Doar</a>
					      <a href="doacao-listagem.php">Doações</a>
					      	<?php  
							if (usuarioEstaLogado()) {
							?>
					      <a href="#">Sair</a>
					      	<?php
							}
							?>
					    </nav>
					</div>	
				</div>
			</div>

		</div>
<?php
	} else {
		header("Location: login.php");
	}
	
	require_once("rodape.php");
?>