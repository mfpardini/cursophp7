<?php

class Usuario {

	private $idusuario;
	private $login;
	private $senha;
	private $dt_cadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($value){
		$this->login = $value;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($value){
		$this->senha = $value;
	}

	public function getDt_cadastro(){
		return $this->dt_cadastro;
	}

	public function setDt_cadastro($value){
		$this->dt_cadastro = $value;
	}

	public function loadById($id) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));
		if (count($results) > 0) {
			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDt_cadastro(new DateTime($row['dt_cadastro']));
		}

	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"dt_cadastro"=>$this->getDt_cadastro()->format("d/m/Y H:i:s")
		));
	}
}

?>