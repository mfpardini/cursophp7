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

	public function __construct($login ="", $senha =""){
		$this->setLogin($login);
		$this->setSenha($senha);
	}

	public function loadById($id) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));
		if (count($results) > 0) {
			$this->setDados($results[0]);
		}

	}

	public static function getList(){
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY login");
	}

	public static function search($login){
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE login LIKE :SEARCH ORDER BY login", array(
			':SEARCH'=>"%".$login."%"
		));
	}

	public function login($login, $password){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));
		if (count($results) > 0) {
			$this->setDados($results[0]);
			
		} else {
			throw new Exception("Login e/ou senha inválidos");
		}
	}

	public function insert(){
		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getLogin(),
			':PASSWORD'=>$this->getSenha()
		));

		if (count($results) > 0) {
			$this->setDados($results[0]);
		}
	}

	public function update($newlogin, $newsenha){
		$this->setLogin($newlogin);
		$this->setSenha($newsenha);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuario SET login = :LOGIN, senha = :SENHA WHERE idusuario = :ID", array(
			':LOGIN'=>$this->getLogin(),
			':SENHA'=>$this->getSenha(),
			':ID'=>$this->getIdusuario()
		));

	}

	private function setDados($dados){
		$this->setIdusuario($dados['idusuario']);
		$this->setLogin($dados['login']);
		$this->setSenha($dados['senha']);
		$this->setDt_cadastro(new DateTime($dados['dt_cadastro']));
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