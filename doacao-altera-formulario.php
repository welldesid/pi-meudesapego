			<?php 
				require_once("cabecalho.php");

				//verificaUsuario();
				
				/*$categoria = new Categoria();
			    $categoria->setId(1);

			    $doacao = new Doacao("", "", "", "Disponível", "0000-00-00", 1, $categoria, 1); //Passo os meu parâmetros vazios, são obrigatórios, segundo o que definimos na classe Produto, porém posso passar um valor vazio. Menos categoria, pois preciso trazer a listagem.

			    $categoriaDao = new CategoriaDao($conexao);
			    $categorias = $categoriaDao->listaCategorias();*/
			    $categoriaDao = new CategoriaDao($conexao);
			    $categorias = $categoriaDao->listaCategorias();

			    $iddoacao = $_GET['iddoacao'];

			    $doacaoDao = new DoacaoDao($conexao);
			    $doacao = $doacaoDao->buscaDoacao($iddoacao);
			?>
			<style type="text/css">
				select[readonly]{
					background: #eee;
					pointer-events: none;
					touch-action: none;
				}
			</style>
				<div class="card" id="cardcategoria">
				 	<div class="card-header">
				 		Gerenciar Doação
				 	</div>
				 	<div class="card-body">
				 		<form action="controllers/altera-doacao.php" method="post" enctype="multipart/form-data">
				 			<input type="hidden" name="iddoacao" value="<?= $doacao->getId(); ?>">
				 			<div class="row mb-4">
								<label for="titulo" class="col-sm-2 col-form-label">Título:</label>
								<div class="col-sm-9">
									<input type="text" name="titulo" class="form-control" placeholder="O que você vai doar?" value="<?= $doacao->getTitulo(); ?>" readonly>
								</div>
							</div>
							<div class="row mb-4">
								<label for="descricao" class="col-sm-2 col-form-label">Descrição da doação:</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="descricao" rows="4" placeholder="Descrição do item à ser doado. Por exemplo: Cor, estado de conservação, etc." readonly><?= $doacao->getDescricao(); ?></textarea>
								</div>
							</div>
							<div class="row mb-4">
								<label for="idcategoria" class="col-sm-2 col-form-label">Categoria:</label>
								<div class="col-sm-9">
									<select class="form-select" name="idcategoria" readonly="readonly" aria-disabled="true" tabindex="-1">
                                        <?php 
                                            foreach ($categorias as $categoria):
                                                $essaEhACategoria = $doacao->getCategoria()->getId() == $categoria->getId(); //Verifico se os ids batem
                                                $selecao = $essaEhACategoria ? "selected='select'" : ""; //Se a condição acima for verdadeira, então ele atribui esse valor a minha option
                                         ?>
                                        <option value="<?= $categoria->getId()?>" <?= $selecao; ?>>
                                            <?= $categoria->getNome() ?>
                                        </option>
                                        <?php 
                                            endforeach;
                                         ?>
                                    </select>
								</div>
							</div>
							<div class="row mb-4">
								<label for="foto" class="col-sm-2 col-form-label">Foto:</label>
								<div class="col-sm-9">
									<input type="hidden" name="foto">
									Foto aqui
								</div>
							</div>
							<div class="row mb-4">
								<label for="status" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-9">
									<select class="form-select" name="status">
										<option value="Disponível" <?= ($doacao->getStatus() == 'Disponível')?'selected':'' ?>>Disponível</option>
										<option value="Aguardando" <?= ($doacao->getStatus() == 'Aguardando')?'selected':'' ?>>Aguardando</option>
										<option value="Doado" <?= ($doacao->getStatus() == 'Doado')?'selected':'' ?>>Doado</option>
									</select>
								</div>
							</div>
							<br>
						 	<div class="col-auto">
						 		<button type="submit" class="btn btn-primary btn-lg" name="status">Alterar</button>
						 	</div>
						</form>
					<?php require_once("rodape.php"); ?>