<?php 
/**
 * Classe Categoria
 */
class Categoria
{
	private $idcategoria;
	private $categoria;
	
	function __construct($categoria)
	{
		$this->categoria = $categoria;
	}

	public function getId()
	{
		return $this->idcategoria;
	}
	public function setId($idcategoria')
	{
		$this->idcategoria = $idcategoria;
	}

	public function getCategoria()
	{
		return $this->categoria;
	}
	public function setCategoria($categoria)
	{
		$this->categoria = $categoria;
	}
}
 ?>