<?php  

include_once '../classes/acesso.class.php';
include_once '../classes/usuarios.class.php';
include_once '../banco_de_dados/conexao.php';

switch ($_GET['acao']){
	case 'cadastrar':
			if (isset($_GET['motivo']) && !empty($_GET['visitante'])){
			
			$dc = addslashes($_GET['dc']);
			$turno = addslashes($_GET['turno']);
			$motivo = addslashes($_GET['motivo']);
			$servico = addslashes($_GET['servico']);
			$equipamento = addslashes($_GET['equipamento']);
			$obs = addslashes($_GET['obs']);
			$visitante = addslashes($_GET['visitante']); 
			$empresa = addslashes($_GET['empresa']);
			$operador = addslashes($_GET['operador']);
			$data = explode('/', addslashes($_GET['data']));
				$data = $data[2].'-'.$data[1].'-'.$data[0];
			$entrada = addslashes($_GET['entrada']);
			$saida = addslashes($_GET['saida']);
			$meio_de_contato = addslashes($_GET['meio_de_contato']);
			$solicitacao_acesso = addslashes($_GET['solicitacao_acesso']);
			$agendamento = addslashes($_GET['agendamento']);
			$chegada = addslashes($_GET['chegada']);
			$area_atuacao  = addslashes($_GET['area_atuacao']);

			$ac = new Acesso($pdo);

			$ac->cadastrarAcesso($dc, $turno, $motivo, $servico, $equipamento, $obs, $visitante, $empresa, $operador, $data, $entrada, $saida, $meio_de_contato, $solicitacao_acesso, $agendamento, $chegada, $area_atuacao);

			header("Location: ../cad_acesso.php?msg=Acesso cadastrado com sucesso!");
		}

		break;
	case 'deletar':
		# code...
		break;
	default:
		# code...
		break;
}



?>