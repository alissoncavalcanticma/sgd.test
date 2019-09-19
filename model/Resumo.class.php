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

	public function insertResumo($data, $turno, $operador, $resumo){

		$this->data = $data;
		$this->turno = $turno;
		$this->operador = $operador;
		$this->resumo = $resumo;


		$sql = "INSERT INTO resumos (data, turno, operador, resumo) VALUES ( '$this->data', '$this->turno', '$this->operador', '$this->resumo')";

		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		return true;
	}

	public function editResumo($id, $data, $turno, $operador, $resumo){

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