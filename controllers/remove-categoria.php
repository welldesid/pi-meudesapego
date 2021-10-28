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
	
	$categoria = new Categoria();
	$categoria->setId($_POST["idcategoria"]);

	$categoriaDao = new CategoriaDao($conexao);

	if ($categoriaDao->deletaCategoria($categoria)) {
		$_SESSION["success"] = "Categoria removida com sucesso!";

		header("Location: ../formulario-categoria.php"); //Após remoção, redireciona para a minha listagem, afirmando que foi removido
		die(); //SEMPRE depois de um location, é preciso fazer um die, para que ele pare a execução a partir daqui. Por questões de Segurança
	} else{
		$msg = mysqli_error($conexao); //me devolve uma mensagem de erro
?>
		<p class="alert-danger">Oh-Oh! Algo deu errado! =/</p>
		<p>Erro: <?= $msg ?> </p>
<?php
	}
	
 ?>