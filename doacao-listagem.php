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
				 		<div class="row row-cols-1 row-cols-md-3 g-4">
						  <div class="col">
						    <div class="card h-100">
						      <img src="..." class="card-img-top" alt="...">
						      <div class="card-body">
						        <h5 class="card-title">Card title</h5>
						        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						      </div>
						      <div class="card-footer">
						        <small class="text-muted">Last updated 3 mins ago</small>
						      </div>
						    </div>
						  </div>
						  <div class="col">
						    <div class="card h-100">
						      <img src="..." class="card-img-top" alt="...">
						      <div class="card-body">
						        <h5 class="card-title">Card title</h5>
						        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
						      </div>
						      <div class="card-footer">
						        <small class="text-muted">Last updated 3 mins ago</small>
						      </div>
						    </div>
						  </div>
						  <div class="col">
						    <div class="card h-100">
						      <img src="..." class="card-img-top" alt="...">
						      <div class="card-body">
						        <h5 class="card-title">Card title</h5>
						        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
						      </div>
						      <div class="card-footer">
						        <small class="text-muted">Last updated 3 mins ago</small>
						      </div>
						    </div>
						  </div>
						</div>
					<?php require_once("rodape.php"); ?>