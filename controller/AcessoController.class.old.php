<?php

require '../autoload.php';

$acessoC = new AcessoController();


if(isset($_GET['acao']) && !empty($_GET['acao'])){
	$acao = $_GET['acao'];
}else{
	$acao = "";
}

switch ($acao) {
	case 'cadastrar':
			if (isset($_GET['motivo']) && !empty($_GET['solicitante'])){

				$acessoC->cadastrarAcesso();

				header("Location: ../view/cad_acesso.php?msg=Acesso cadastrado com sucesso!");
		}

		break;
	case 'editar':
			if (isset($_GET['id']) && !empty($_GET['id'])){
				
				$acessoC->editarAcesso($_GET['id']);

				header("Location: ../view/cad_acesso.php?msg=Acesso editado com sucesso!&id=".$_GET['id']);
			}
		break;
	default:
		
		break;
}

class AcessoController{

	public function cadastrarAcesso(){

			$dc = addslashes($_GET['dc']);
			$turno = addslashes($_GET['turno']);
			$operador = addslashes($_GET['operador']);
			$data = explode('/', addslashes($_GET['data']));
				$data = $data[2].'-'.$data[1].'-'.$data[0];
			$motivo = addslashes($_GET['motivo']);
			$equipamento = addslashes($_GET['equipamento']);
			$servico = addslashes($_GET['servico']);
			$obs = addslashes($_GET['obs']);
			$solicitante = addslashes($_GET['solicitante']);
			$empresa = addslashes($_GET['empresa']);
			$area_atuacao  = addslashes($_GET['area_atuacao']);
			$meio_de_contato = addslashes($_GET['meio_de_contato']);
			$solicitacao_acesso = addslashes($_GET['solicitacao_acesso']);
			$agendamento = addslashes($_GET['agendamento']);
			$chegada = addslashes($_GET['chegada']);
			$entrada = addslashes($_GET['entrada']);
			$saida = addslashes($_GET['saida']);

			$pdo = new Conexao();
			$acesso = new Acesso($pdo);

			$acesso->cadastrarAcesso($dc, $turno, $motivo, $servico, $equipamento, $obs, $solicitante, $empresa, $operador, $data, $entrada, $saida, $meio_de_contato, $solicitacao_acesso, $agendamento, $chegada, $area_atuacao);
	}

	public function listaAcessos(){

			$pdo = new Conexao();
			$acesso = new Acesso($pdo);
			return $acesso->getAcessos();
	}

	public function retornaAcesso($id){
			$i = $id;
			$pdo = new Conexao();
			$acesso = new Acesso($pdo);
			return $acesso->getAcesso($i);

	}
	public function editarAcesso($id){

			$i = addslashes($id);
			$dc = addslashes($_GET['dc']);
			$turno = addslashes($_GET['turno']);
			$operador = addslashes($_GET['operador']);
			$data = explode('/', addslashes($_GET['data']));
				$data = $data[2].'-'.$data[1].'-'.$data[0];
			$motivo = addslashes($_GET['motivo']);
			$equipamento = addslashes($_GET['equipamento']);
			$servico = addslashes($_GET['servico']);
			$obs = addslashes($_GET['obs']);
			$solicitante = addslashes($_GET['solicitante']);
			$empresa = addslashes($_GET['empresa']);
			$area_atuacao  = addslashes($_GET['area_atuacao']);
			$meio_de_contato = addslashes($_GET['meio_de_contato']);
			$solicitacao_acesso = addslashes($_GET['solicitacao_acesso']);
			$agendamento = addslashes($_GET['agendamento']);
			$chegada = addslashes($_GET['chegada']);
			$entrada = addslashes($_GET['entrada']);
			$saida = addslashes($_GET['saida']);

			$pdo = new Conexao();
			$acesso = new Acesso($pdo);

			$acesso->editAccess($i, $dc, $turno, $motivo, $servico, $equipamento, $obs, $solicitante, $empresa, $operador, $data, $entrada, $saida, $meio_de_contato, $solicitacao_acesso, $agendamento, $chegada, $area_atuacao);
	}
}




?>