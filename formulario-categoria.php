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
 		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
 	</head>
 	<body>
 		<div class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand">Gerenciar Doações</a>
				</div>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="nav navbar-nav">
						<li><a href="doacao.php" class="nav-link">Adiciona Doação</a></li>
						<li><a href="#" class="nav-link">Doações</a></li>
						<li><a href="formulario-categoria.php" class="nav-link">Categoria</a></li>
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
				 		Gerenciar Categoria
				 	</div>
				 	<div class="card-body">
				 		<form action="controllers/adiciona-categoria.php" method="post" class="row g-3">
				 			<div class="col-auto">
				 				<label for="nome" class="form-label">Categoria:</label>
				 			</div>
				 			<div class="col-auto">
						 		<input type="text" name="nome" class="form-control" id="categoria">
				 			</div>
						 	<div class="col-auto">
						 		<button type="submit" class="btn btn-primary">Cadastrar</button>
						 	</div>
						 </form>
						 <hr>
						 <br>

						 <!-- LISTAGEM	-->
						 <table class="table table-hover">
						 	<thead>
						 		<tr>
						 			<th>ID</th>
						 			<th style="width: 50%">Descrição</th>
						 			<th style="width: 30%">Ações</th>
						 		</tr>
						 	</thead>
						 	<tbody>
						 	<?php 
					 			$categoriaDao = new CategoriaDao($conexao);
					 			$categorias = $categoriaDao->listaCategorias();
					 			foreach ($categorias as $categoria):
					 		 ?>
					 		 	<tr>
					 		 		<th scope="row"><?= $categoria->getId();?></th>
									<td><?= $categoria->getNome();?></td>
					 		 		<td>
						 				<button type="button" class="btn btn-outline-info" title="Editar">
						 					<i class="bi bi-pencil-square"> Editar</i>
						 				</button>
						 				<form action="controllers/remove-categoria.php" method="post">
						 					<input type="hidden" name="idcategoria" value="<?= $categoria->getId(); ?>">
						 					<button class="btn btn-outline-danger">
							 					<i class="bi bi-trash"> Excluir</i>
							 				</button>
						 				</form>
						 			</td>
					 		 	</tr>
					 		 <?php endforeach;?>
						 	</tbody>
						</table>
				 	</div>
				 	<br>

				 	<!-- PAGINAÇÃO CASO HAJA -->
				 	<nav aria-label="Page navigation example">
					  <ul class="pagination justify-content-center">
					    <li class="page-item disabled">
					      <a class="page-link">Anterior</a>
					    </li>
					    <li class="page-item active"><a class="page-link" href="#">1</a></li>
					    <li class="page-item"><a class="page-link" href="#">2</a></li>
					    <li class="page-item"><a class="page-link" href="#">3</a></li>
					    <li class="page-item">
					      <a class="page-link" href="#">Próximo</a>
					    </li>
					  </ul>
					</nav>
				 </div>
			</div>
		</div>
 	</body>
 </html>