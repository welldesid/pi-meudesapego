<?php 
	//require_once("cabecalho.php"); padronizar e criar um cabeçalho depois
	//Início do que precisa estar no cabeçalho
	//require_once("logica-usuario.php");
	require_once("../formulario-categoria.php");
	require_once("../conecta.php");
	require_once('../class/Categoria.php');
	require_once('../class/CategoriaDao.php');
	//Fim do que precisa estar no cabeçalho
	
	//verificaUsuario();
	
	$id = $_POST['idcategoria'];

	$categoriaDao = new CategoriaDao($conexao);

	if ($categoriaDao->deletaCategoria($id)) {
?>
		<p class="alert-success">Categoria excluida com sucesso!</p>
<?php
	} else{
		$msg = mysqli_error($conexao); //me devolve uma mensagem de erro
?>
		<p class="alert-danger">Oh-Oh! Algo deu errado! =/</p>
		<p>Erro: <?= $msg ?> </p>
<?php
	}
	
 ?>