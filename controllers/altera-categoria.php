<?php 
	//require_once("cabecalho.php"); padronizar e criar um cabeçalho depois
	//Início do que precisa estar no cabeçalho
	//require_once("logica-usuario.php");
	require_once("../conecta.php");
	require_once('../class/Categoria.php');
	require_once('../class/CategoriaDao.php');
	//Fim do que precisa estar no cabeçalho
	
	//verificaUsuario();
	
	$nome = $_POST["nome"];

	$categoria = new Categoria($nome);
	$categoria->setId($_POST["idcategoria"]);

	$categoriaDao = new CategoriaDao($conexao);

	if ($categoriaDao->alteraCategoria($categoria)) {
?>
		<p class="alert-success">Categoria alterada com sucesso!</p>
<?php
	} else {
		$msg = mysqli_error($conexao); //me devolve uma mensagem de erro
?>
		<p class="alert-danger">Oh-Oh! Algo deu errado! =/</p>
		<p>Erro: <?= $msg ?> </p>
<?php
	}
	
?>