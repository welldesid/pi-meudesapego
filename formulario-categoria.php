<?php 
	require_once("alertas.php");
	require_once("conecta.php");

	//Função para carregar/chamar minhas classes da pasta class/
	function carregaClasse($nomeDaClasse){
		require_once("class/".$nomeDaClasse.".php");
	}

	//Função nativa que registra a minha função acima, e a roda, chamando todas as classes.
	//Com a minha função, e essa nativa, não há necessidade de ficar chamando minhas classes em outros arquivos, já que está sendo carregadas no cabeçalho.
	spl_autoload_register("carregaClasse");
 ?>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Categoria</title>
 		<link rel="stylesheet" type="text/css" href="bootstrap-5.1.3-dist/css/bootstrap.css">
 		<link rel="stylesheet" type="text/css" href="css/categoria.css">
 		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 	</head>
 	<body>
 		<div class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand">Gerenciar Doações</a>
				</div>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="nav navbar-nav">
						<li><a href="#" class="nav-link">Adiciona Doação</a></li>
						<li><a href="#" class="nav-link">Doações</a></li>
						<li><a href="#" class="nav-link">Adiciona Categoria</a></li>
						<li><a href="contato.php" class="nav-link">Contato</a></li>
					</ul>
				</div>
				<?php  
					//if (usuarioEstaLogado()) {
				?>
					<a href="logout.php">Sair</a>
				<?php
					//}
				?>
			</div>
		</div>
		<div class="container">
			<div class="principal">
				<?php 
					mostraAlerta("success");
					mostraAlerta("danger");
				 ?>
				 <div class="card" id="cardcategoria">
				 	<div class="card-header">
				 		Cadastro de Categoria
				 	</div>
				 	<div class="card-body">
				 		<form action="controllers/adiciona-categoria.php" method="post">
						 	<div class="mb-3">
						 		<label for="categoria" class="form-label">Categoria:</label>
						 		<input type="text" name="categoria" class="form-control" id="categoria">
						 	</div>
						 	<button type="submit" class="btn btn-primary">Cadastrar</button>
						 </form>
				 	</div>
				 </div>
			</div>
		</div>
 	</body>
 </html>