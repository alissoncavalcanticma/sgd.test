<?php

class Resumo{
	
	private $pdo;
	
	private $id;
	private $turno;
	private $operador;
	private $data;
	private $resumo;

	public function __construct($pdo){

		$this->pdo = $pdo;
		$this->pdo->exec('SET NAMES utf8');

	}

	public function getId(){
		return $this->id;
	}

	public function getResumo($id){
		
		$this->id = $id;
		$sql = "SELECT * FROM resumos WHERE id  = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();

			return $array;
		}

		return $array;
	}

	public function getResumos(){

		$sql = "SELECT * FROM resumos ORDER BY id DESC";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}

		return $array;
	}

	public function insertResumo($turno, $operador, $data, $resumo){

		$this->turno = $turno;
		$this->operador = $operador;
		$this->data = $data;
		$this->resumo = htmlentities($resumo);

		$sql = "INSERT INTO resumos (turno, operador, data, resumo) VALUES ('$this->turno', '$this->operador', '$this->data', '$this->resumo')";
		$sql = $this->pdo->prepare($sql);
		
		$sql->execute();

		return true;
		
		echo "passou";
		exit();
	}

	public function editResumo($id, $turno, $operador, $data, $resumo){

		$this->id = $id;
		$this->data = $data;
		$this->turno = $turno;
		$this->operador = $operador;
		$this->resumo = $resumo;


		$sql = "UPDATE acessos SET data = '$this->data', turno = '$this->turno', operador = '$this->operador', resumo = '$this->resumo' WHERE id = '$this->id'";

		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		return true;
	}

	public function deletarResumo($id){
		$this->id = $id;
		$sql = "DELETE FROM resumos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->execute();

		return true;
	}
}

?>