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

	public function getResumos($ini, $max){

		$inicio = $ini;
		$maximo = $max;
		$sql = "SELECT * FROM resumos ORDER BY id DESC LIMIT $inicio, $maximo"; //consulta no BD
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}

		return $array;
	}

	public function getPesquisa($ini, $max, $pesquisa){

		$inicio = $ini;
		$maximo = $max;
		$param = $pesquisa;
		//$sql="SELECT * FROM acessos ORDER BY id DESC LIMIT $inicio, $maximo"; //consulta no BD
		$sql = "SELECT * FROM resumos WHERE id LIKE '%$param%' OR turno LIKE '%$param%' OR operador LIKE '%$param%' OR data LIKE '%$param%' OR resumo LIKE '%$param%' ORDER BY id DESC LIMIT $inicio, $maximo";
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
		//$this->resumo = htmlspecialchars($resumo);
		$this->resumo = $resumo;

		//echo $this->resumo;
		//exit();

		$sql = "INSERT INTO resumos (turno, operador, data, resumo) VALUES ('$this->turno', '$this->operador', '$this->data', '$this->resumo')";
		
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		return true;
		
		//echo "passou";
		//exit();
	}

	public function editResumo($id, $turno, $data, $resumo){

		$this->id = $id;
		$this->turno = $turno;
		//$this->operador = $operador;
		$this->data = $data;
		$this->resumo = $resumo;

		//echo $this->operador;
		//exit();

		$sql = "UPDATE `resumos` SET turno = '$this->turno', data = '$this->data', resumo = '$this->resumo' WHERE id = '$this->id'";

		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		return true;

		/**
		 * $sql = "UPDATE acessos SET dc = '$this->dc', turno = '$this->turno', motivo = '$this->motivo', servico = '$this->servico', equipamento = '$this->equipamento', obs = '$this->obs', solicitante = '$this->solicitante', empresa = '$this->empresa', operador = '$this->operador', operador_2 = '$this->operador_2', data = '$this->data', entrada = '$this->entrada', saida = '$this->saida', meio_de_contato = '$this->meio_de_contato', solicitacao_acesso = '$this->solicitacao_acesso', agendamento = '$this->agendamento', chegada = '$this->chegada', area_atuacao = '$this->area_atuacao' WHERE id = '$this->id'";

		*  $sql = $this->pdo->prepare($sql);
		*  $sql->execute();

		*  return true;
		 */
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