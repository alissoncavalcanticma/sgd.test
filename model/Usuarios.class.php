<?php 

class Usuarios{

	private $pdo;
	private $id;
	private $usuario;
	private $senha;
	private $email;
	private $apelido;
	private $nome;

	public function __construct($pdo, $id = '', $usuario = '', $senha = '', $email = '', $apelido = '',  $nome = ''){
		$this->pdo = $pdo;
		$this->id = $id;
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->email = $email;
		$this->apelido = $apelido;
		$this->nome = $nome;
	}

	public function getId(){
		return $this->id;
	}

	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getApelido(){
		return $this->apelido;
	}
	public function setApelido($apelido){
		$this->apelido = $apelido;
	}

	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}


	public function getUsuarios($pStatus){

		$sql = "SELECT * FROM usuarios $pStatus";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}

		return $array;
	}

	public function validaLogin($a, $b){
		$array = array();
		$user = $a;
		$pass = $b;
		$sql = "SELECT * FROM usuarios WHERE usuario = :user AND senha = :pass AND status != 'inativo'";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":user", $user);
		$sql->bindValue(":pass", $pass);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			session_start();
			$_SESSION['logon'] = $array['apelido'];
			$_SESSION['logon_email'] = $array['email'];
			$_SESSION['logon_nome'] = $array['nome_completo'];
			return true;
		}else{
			return false;
		}
	}

	public function deslogar(){
		
		$sessao = session_start();
		session_unset($sessao);

		return true;
	}

	public function returnApelido($i){
		//$sql = "SELECT * FROM usuarios WHERE id = $i and status != 'inativo'";
		$sql = "SELECT apelido FROM usuarios WHERE id = $i";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		//$array = array();

		if($sql->rowCount() > 0){
			$apelido = $sql->fetch();

			return $apelido;
		}

		return $apelido;
	}
}

?>