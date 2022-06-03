<?php 
	require_once("../cabecalho-forcontrollers.php");
	
	verificaNivelAcesso();
	
	$pesquisa = $_POST['pesquisa'];

	$doacaoDao = new DoacaoDao($conexao);

	$doacaoDao->pesquisaDoacao($pesquisa);
	
 ?>