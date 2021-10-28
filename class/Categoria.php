<?php 
/**
 * Classe Categoria
 */
class Categoria
{
	private $idcategoria;
	private $nome;
	
	/*Resolver esse problemas, pois não está adionando por conta desse trecho comentado*/
	/*function __construct($nome)
	{
		$this->nome = $nome;
	}*/

	public function getId()
	{
		return $this->idcategoria;
	}
	public function setId($idcategoria)
	{
		$this->idcategoria = $idcategoria;
	}

	public function getNome()
	{
		return $this->nome;
	}
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
}
 ?>