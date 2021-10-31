<?php

//CRUD
class DoadorService {

	private $conexao;
	private $doador;

	public function __construct(ConexaoPDO $conexao, Doador $doador) {
		$this->conexao = $conexao->conectar();
		$this->doador = $doador;
		echo '<pre>';
		print_r($doador);
		echo '</pre>';
	}

	public function inserir() { //create
		//$query = 'insert into doador(doador) values(:doador)';
		$query = 'insert into doador(nome_completo, dt_nasc, email, senha)values(:nome_completo, :dt_nasc, :email, :senha)';
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(':doador', $this->doador->__get('doador'));
		$stmt->bindValue(':nome_completo', $this->doador->__get('nome_completo'));
		$stmt->bindValue(':dt_nasc', $this->doador->__get('dt_nasc'));
		$stmt->bindValue(':email', $this->doador->__get('email'));
		$stmt->bindValue(':senha', $this->doador->__get('senha'));
		$stmt->execute();

	}

	
}

?>