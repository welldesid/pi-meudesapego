<?php

class Doador {
	private $iddoador;
    private $nome_completo;
    private $dt_nasc;
    private $email;
	private $senha;
	
	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

?>