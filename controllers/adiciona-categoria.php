<?php 
	//require_once("cabecalho.php"); padronizar e criar um cabeçalho depois
	//Início do que precisa estar no cabeçalho
	//require_once("logica-usuario.php");
	require_once("../alertas.php");
	require_once("../conecta.php");
	require_once("../class/Categoria.php");
	require_once("../class/CategoriaDao.php");
	//Fim do que precisa estar no cabeçalho
	
	//verificaUsuario();

	$nome = $_POST["categoria"];

	$categoria = new Categoria($nome);
	$categoriaDao = new CategoriaDao($conexao);

	if ($categoriaDao->insereCategoria($categoria)) {
?>
		<p class="alert-success">Categoria adicionada com sucesso!</p>
<?php
	}else{
		$msg = mysqli_error($conexao);
?>
		<p class="alert-danger">Algo deu de errado!</p>
		<p>Erro: <?= $msg ?></p>
<?php
	}

	mysqli_close($conexao);
 ?>