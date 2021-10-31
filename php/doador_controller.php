<?php
	/*echo '<pre>';
	print_r($_POST);	
	echo '<pre>';
*/
	
	require "doador.model.php";
	require "doador.service.php";
	require "Connect.php";

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


	if($acao == 'inserir' ) {
		$doador = new Doador();
		$doador->__set('nome_completo', $_POST['nomecompleto']);
		$doador->__set('dt_nasc', $_POST['datanasc']);
		$doador->__set('email', $_POST['email']);
		$doador->__set('senha', $_POST['senha']);

		$conexao = new ConexaoPDO();

		$doadorService = new DoadorService($conexao, $doador);
		$doadorService->inserir();
		header('Location: novo_doador.php?inclusao=1');
	}







	/*
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir' ) {
		$doador = new Doador();
		$doador->__set('nome_completo', $_POST['nomecompleto']);
		$doador->__set('dt_nasc', $_POST['data']);
		$doador->__set('email', $_POST['email']);
		$doador->__set('idendereco', $_POST['rua']);

		$conexao = new ConexaoPDO();

		$doadorService = new DoadorService($conexao, $doador);
		$doadorService->inserir();

		//header('Location: novo_doador.php?inclusao=1');
	
	} 
*/
?>