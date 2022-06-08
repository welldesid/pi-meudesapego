				<?php 
					require_once("cabecalho.php");

					verificaNivelAcesso();

				    $doacaoDao = new DoacaoDao($conexao);
					$doacoes = $doacaoDao->listaDoacoes();

					if ($_POST) {
						$pesquisa = $_POST['pesquisa'];
						$buscadoacao = $doacaoDao->pesquisaDoacao($pesquisa);
					} else {
						$buscadoacao = $doacaoDao->pesquisaDoacao();
					}

				?>
				<div class="card" id="carddoacao">
				 	<div class="card-header">
				 		Gerenciar Doação
				 	</div>
				 	<div class="card-body">
				 		<form method="post" action="">
				 			<div class="container">
				 				<div class="row justify-content-end">
				 					<div class="col-md-4">
						 				<div class="input-group">
							 				<input type="text" name="pesquisa" class="form-control" placeholder="Digite aqui a sua busca" aria-describedby="pesquisa" aria-label="Digite aqui a sua busca">
							 				<button class="btn btn-outline-secondary" type="submit" id="btnbuscar"><i class="bi bi-search"> Buscar</i></button>
								 		</div>
								 		<div align="right">
								 			<a href="doacao-listagem.php">Limpar Busca</a>
								 		</div>
						 			</div>
				 				</div>
				 			</div>
				 		</form>
				 		<div class="container">
				 			<div class="row">
					 		<?php
				 				foreach ($buscadoacao as $busca):
				 			?>
								<div class="col-md-3 col-xs-12 g-4">
						    		<div class="card h-100">
						    			<img src="uploads/<?= $busca->getFoto()?>" class="card-img-top img-fluid" alt="Foto Doação">
						      			<div class="card-body">
						        			<h5 class="card-title"><?= $busca->getTitulo(); ?></h5>
						        			<p class="card-text">Status: <?= $busca->getStatus(); ?></p>
						     			</div>
						     			<div class="card-footer">
						      				<a href="doacao-altera-formulario.php?iddoacao=<?= $busca->getId(); ?>" class="btn btn-primary">Gerenciar</a>
						      			</div>
						    		</div>
						  		</div>
							<?php
			 					endforeach;
			 				?>
							</div>
				 			<!--<br>
				 			<br>
				 			<br>
				 			<div class="row">
					 		<?php
				 				/*foreach ($doacoes as $doacao):
				 			?>
								<div class="col-md-3 col-xs-12 g-4">
						    		<div class="card h-100">
						    			<img src="uploads/<?= $doacao->getFoto()?>" class="card-img-top img-fluid" alt="Foto Doação">
						      			<div class="card-body">
						        			<h5 class="card-title"><?= $doacao->getTitulo(); ?></h5>
						        			<p class="card-text">Status: <?= $doacao->getStatus(); ?></p>
						     			</div>
						     			<div class="card-footer">
						      				<a href="doacao-altera-formulario.php?iddoacao=<?= $doacao->getId(); ?>" class="btn btn-primary">Gerenciar</a>
						      			</div>
						    		</div>
						  		</div>
							<?php
			 					endforeach;*/
			 				?>
							</div>-->
				 		</div>
					</div>
					<br>
					<br>
					<hr>
					<!-- PAGINAÇÃO -->
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
					<?php require_once("rodape.php"); ?>