<?php 
/*
DAO - Data Access Object
É uma classe criada para encapsular o trabalho de funções que acessam o banco de dados, como insert, update, delete, search e read.
 */
class DoacaoDao
{
	private $conexao; //Ao adicionar o atributo $conexao aqui,sendo private, ela só poderá ser acessada diretamente dentro da classe DoacaoDao
	
	//Criando o costrutor, torno obrigatório o uso do atributo conexao
	function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	function insereDoacao($doacao)
	{
		$query = "insert into doacao (titulo, descricao, foto, status, dt_doacao, iddoador, idcategoria, idong) values ('{$doacao->getTitulo()}', '{$doacao->getDescricao()}', '{$doacao->getFoto()}', '{$doacao->getStatus()}', NOW(), {$doacao->getDoador()}, {$doacao->getCategoria()->getId()}, {$doacao->getOng()})";

		return mysqli_query($this->conexao, $query);
	} //$doacao->getDoador()->getId() / $doacao->getOng()->getId()

	function listaDoacoes()
	{
		$doacoes = array();
		$resultado = mysqli_query($this->conexao, "select titulo, foto, status from doacao");
		while ($doacao_array = mysqli_fetch_assoc($resultado)){
			$titulo = $doacao_array['titulo'];
			$foto = $doacao_array['foto'];
			$status = $doacao_array['status'];

			$doacao = new Doacao($titulo, $foto, $status);

			$doacao->setId($doacao_array['iddoacao']);

			array_push($doacoes, $doacao);
		}
		return $doacoes;
	}

	function buscaDoacao($iddoacao)
	{
		$query = "select * from doacao where iddoacao = {$iddoacao}";

		$resultado = mysqli_query($this->conexao, $query);

		$doacao_buscada = mysqli_fetch_assoc($resultado);

		$categoria = new Categoria();
		$categoria->setId($doacao_buscada['idcategoria']);

		/* 
		Doador		

		$doador = new Doador();
		$doador->setId($doacao_buscada['iddoador']);
		*/
	
		$titulo = $doacao_buscada['titulo'];
		$descricao = $doacao_buscada['descricao'];
		$foto = $doacao_buscada['foto'];
		$status = $doacao_buscada['status'];
		$dt_doacao = $doacao_buscada['dt_doacao'];
		$iddoador = 1; //provisório
		$idong = 1;

		$doacao = new Doacao($titulo, $descricao, $foto, $status, $dt_doacao, $iddoador, $categoria, $idong); //Falta doador.
		$doacao->setId($doacao_buscada['iddoacao']);

		return $doacao;
	}

	function alteraDoacao($doacao)
	{
		$query = "update doacao set status = '{$doacao->getStatus()}' where iddoacao = {$doacao->getId()}";
		return mysqli_query($this->conexao, $query);
	}
}
?>