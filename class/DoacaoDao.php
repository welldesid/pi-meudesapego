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
		$consulta = "select * from doacao as d join categoria as c on c.idcategoria = d.idcategoria order by status != 'Disponível', status";
		$resultado = mysqli_query($this->conexao, $consulta);
		//var_dump($resultado);


		/** INÍCIO PAGINAÇÃO **/
		$total_reg = "4"; //número de registros por página
		$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

		if (!$pagina) {
			$pc = "1";
		} else {
			$pc = $pagina;
		}
		
		//Determina o valor inicial das buscas limitadas
		$inicio = $pc -1;
		$inicio = $inicio * $total_reg;

		//Seleciona os dados e exibe a paginação
		$limite = mysqli_query($this->conexao, "select * from doacao as d join categoria as c on c.idcategoria = d.idcategoria order by status != 'Disponível', status LIMIT $inicio, $total_reg");
		$todos = mysqli_query($this->conexao, $consulta);

		$tr = mysqli_num_rows($todos); //verifica o numero total de registros
		$tp = $tr / $total_reg; //verifica o número total de páginas


		$_SESSION['pc'] = $pc;
		$_SESSION['tp'] = $tp;
		/** FIM PAGINAÇÃO **/



		while ($doacao_array = mysqli_fetch_assoc($limite)){
			$categoria = new Categoria('');
			$categoria->setNome($doacao_array['nome']);

			$titulo = $doacao_array['titulo'];
			$descricao = $doacao_array['descricao'];
			$foto = $doacao_array['foto'];
			$status = $doacao_array['status'];

			$doacao = new Doacao($titulo, $descricao, $foto, $status, '', '', $categoria,'');

			$doacao->setId($doacao_array['iddoacao']);

			array_push($doacoes, $doacao);
		}

		

		return $doacoes;
	}

	function pesquisaDoacao($pesquisa=''){
		$doacoes = array();
		$resultado = mysqli_query($this->conexao, "select * from doacao as d join categoria as c on c.idcategoria = d.idcategoria where titulo like '%$pesquisa' or descricao like '%$pesquisa' or status like '%$pesquisa' or c.nome like '%$pesquisa' order by status != 'Disponível', status");

		while ($doacao_array = mysqli_fetch_assoc($resultado)){
			$categoria = new Categoria('');
			$categoria->setNome($doacao_array['nome']);

			$titulo = $doacao_array['titulo'];
			$descricao = $doacao_array['descricao'];
			$foto = $doacao_array['foto'];
			$status = $doacao_array['status'];

			$doacao = new Doacao($titulo, $descricao, $foto, $status, '', '', $categoria,'');

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

		$categoria = new Categoria('');
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