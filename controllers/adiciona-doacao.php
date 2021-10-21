<?php 
	//require_once("cabecalho.php"); padronizar e criar um cabeçalho depois
	//Início do que precisa estar no cabeçalho
	//require_once("logica-usuario.php");
	//require_once("/alertas.php");
	require_once("/conecta.php");
	//Fim do que precisa estar no cabeçalho
	
	//verificaUsuario();
	//
	//$categoria = new Categoria();
	//$categoria->setId($_POST["idcategoria"]);
	//
	//$doador = new Doador();
	//$doador->setId($POST["iddoador"]);
	
	$titulo = $_POST["titulo"];
	$descricao = $_POST["descricao"];
	$foto = $_POST["foto"];
	$status = $_POST["status"]; //"Disponível"
	$dt_doacao = $_POST["dt_doacao"]; //Função de data agora
	$idong = $_POST["idong"]; //Fixar por enquanto o id da ONG

	$doacao = new Doacao($titulo, $descricao, $foto, $status, $dt_doacao, $idong); //$categoria e $doador

	$doacaoDao = new DoacaoDao($conexao);

	//Alertas
	if ($doacaoDao->insereDoacao($doacao)) {
?>
		<p class="alert-success">Doação adicionada com sucesso!</p>
<?php
	}else{
		$msg = mysqli_error($conexao);
?>
		<p class="alert-danger">Algo deu errado!</p>
		<p>Erro: <?= $msg ?></p>
<?php
	}

	mysqli_close($conexao);

	//require_once("rodape.php");
 ?>