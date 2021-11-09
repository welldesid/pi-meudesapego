				<?php 
					require_once("cabecalho.php");

					//verificaUsuario();

				    $doacaoDao = new DoacaoDao($conexao);
					$doacoes = $doacaoDao->listaDoacoes();
				?>
				<div class="card" id="carddoacao">
				 	<div class="card-header">
				 		Gerenciar Doação
				 	</div>
				 	<div class="card-body">
				 		<div class="container">
				 			<div class="row">
					 		<?php
				 				foreach ($doacoes as $doacao):
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
			 					endforeach;
			 				?>
							</div>
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