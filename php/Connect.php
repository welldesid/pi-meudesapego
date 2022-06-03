<?php
/** Created by Wellington desiderio 17/10/2021*/

class ConexaoPDO {

	private $host = '127.0.0.1';
	private $dbname = 'doacoesong';
	private $user = 'root';
	private $pass = '';
	private $port = 3306;

	public function conectar() {
		try {

			$conexao = new PDO(
				"mysql:host=$this->host;port=$this->port;dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);
			




			return $conexao;


		} catch (PDOException $e) {
			echo '<p>'.$e->getMessage().'</p>';
		}
	}
}
?>