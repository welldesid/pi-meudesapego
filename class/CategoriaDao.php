<?php 
/**
 * DAO - Data Access Object
É uma classe criada para encapsular o trabalho de funções que acessam o banco de dados, como insert, update, delete, search e read.
 */
class CategoriaDao
{
	private $conexao;
	
	function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	function insereCategoria($categoria)
	{
		$query = "insert into categoria (categoria) values ('{$categoria->getCategoria()}')";
		return mysqli_query($this->conexao, $query);
	}

	function listaCategorias()
	{
		$categorias = array();

		$resultado = mysqli_query($this->conexao, "select * from categoria");

		while ($categoria_array = mysqli_fetch_assoc($resultado)) {
			$categoria = new Categoria();

			$categoria->setId($categoria_array['idcategoria']);
			$categoria->setCategoria($categoria_array['categoria']);

			array_push($categorias, $categoria); //coloco a lista de categorias dentro do meu array $categorias.
		}

		return $categorias;
	}
}
 ?>