<?php
#Usar Desisgn Pattern Fluent Interface
#id dc motivo servico equipamento obs visitante empresa operador data entrada saida meio_de_contato solicitacao_acesso agendamento chegada area_atuacao
#
class Acesso{
	private $pdo;

	private $id;
	private $dc;
	private $turno;
	private $operador;
	private $operador_2;
	private $data; 
	private $motivo;
	private $servico;
	private $equipamento;
	private $obs;
	private $solicitante; 
	private $empresa;
	private $entrada;
	private $saida;
	private $meio_de_contato;
	private $solicitacao_acesso;
	private $agendamento;
	private $chegada;
	private $area_atuacao;

	public function __construct($pdo){

		$this->pdo = $pdo;
		$this->pdo->exec('SET NAMES utf8');

	}
	
	public function getId(){
		return $this->id;
	}

	//public function getAcessos(){
	//	return $this->acessos
	//}
	//
	public function getAcesso($id){
		
		$i = $id;
		$sql = "SELECT * FROM acessos WHERE id  = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $i);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();

			return $array;
		}

		return $array;
	}

	public function getAcessos($ini, $max){

		$inicio = $ini;
		$maximo = $max;
		$sql="SELECT * FROM acessos ORDER BY id DESC LIMIT $inicio, $maximo"; //consulta no BD
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
		$sql = "SELECT * FROM acessos WHERE id LIKE '%$param%' OR dc LIKE '%$param%' OR turno LIKE '%$param%' OR motivo LIKE '%$param%' OR solicitante LIKE '%$param%' OR empresa LIKE '%$param%' OR operador LIKE '%$param%' OR operador_2 LIKE '%$param%' OR data LIKE '%$param%' OR entrada LIKE '%$param%' OR saida LIKE '%$param%' ORDER BY id DESC LIMIT $inicio, $maximo";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}

		return $array;

	}

	public function cadastrarAcesso($dc, $turno,  $motivo, $servico, $equipamento, $obs, $solicitante, $empresa, $operador, $operador_2, $data, $entrada, $saida, $meio_de_contato, $solicitacao_acesso, $agendamento, $chegada, $area_atuacao){

		$this->dc = $dc;
		$this->turno = $turno;
		$this->motivo = $motivo;
		$this->servico = $servico;
		$this->equipamento = $equipamento;
		$this->obs = $obs;
		$this->solicitante = $solicitante; 
		$this->empresa =  $empresa;
		$this->operador = $operador;
		$this->operador_2 = $operador_2;
		$this->data = $data;  	
		$this->entrada = $entrada;
		$this->saida = $saida;
		$this->meio_de_contato = $meio_de_contato;
		$this->solicitacao_acesso = $solicitacao_acesso;
		$this->agendamento = $agendamento;
		$this->chegada = $chegada;
		$this->area_atuacao = $area_atuacao;

		$sql = "INSERT INTO acessos (dc, turno, motivo, servico, equipamento, obs, solicitante, empresa, operador, operador_2, data, entrada, saida, meio_de_contato, solicitacao_acesso, agendamento, chegada, area_atuacao) VALUES ( '$this->dc', '$this->turno', '$this->motivo', '$this->servico', '$this->equipamento', '$this->obs', '$this->solicitante', '$this->empresa', '$this->operador', '$this->operador_2', '$this->data', '$this->entrada', '$this->saida', '$this->meio_de_contato', '$this->solicitacao_acesso', '$this->agendamento', '$this->chegada', '$this->area_atuacao')";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		return true;
	}

	public function editAccess($i, $dc, $turno,  $motivo, $servico, $equipamento, $obs,
		$solicitante, $empresa, /*$operador, $operador_2,*/ $data, $entrada, $saida, $meio_de_contato, $solicitacao_acesso, $agendamento, $chegada, $area_atuacao){

		$this->id = $i;
		$this->dc = $dc;
		$this->turno = $turno;
		$this->motivo = $motivo;
		$this->servico = $servico;
		$this->equipamento =  $equipamento;
		$this->obs = $obs;
		$this->solicitante = $solicitante;
		$this->empresa =  $empresa;
		//$this->operador = $operador;
		//$this->operador_2 = $operador_2;
		$this->data = $data;
		$this->entrada = $entrada;
		$this->saida = $saida;
		$this->meio_de_contato = $meio_de_contato;
		$this->solicitacao_acesso = $solicitacao_acesso;
		$this->agendamento = $agendamento;
		$this->chegada = $chegada;
		$this->area_atuacao = $area_atuacao;

		$sql = "UPDATE acessos SET dc = '$this->dc', turno = '$this->turno', motivo = '$this->motivo', servico = '$this->servico', equipamento = '$this->equipamento', obs = '$this->obs', solicitante = '$this->solicitante', empresa = '$this->empresa', /*operador = '$this->operador', operador_2 = '$this->operador_2',*/ data = '$this->data', entrada = '$this->entrada', saida = '$this->saida', meio_de_contato = '$this->meio_de_contato', solicitacao_acesso = '$this->solicitacao_acesso', agendamento = '$this->agendamento', chegada = '$this->chegada', area_atuacao = '$this->area_atuacao' WHERE id = '$this->id'";

		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		return true;
	}

	public function deletarAcesso($id){
		$this->id = $id;
		$sql = "DELETE FROM acessos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->execute();

		return true;
	}
}

?>