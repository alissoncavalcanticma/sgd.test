<?php

require '../autoload.php';


#echo $_GET['turno']."</br>";
#echo $_GET['operador']."</br>";
#echo $_GET['data']."</br></br>";
#echo $_GET['resumo']."</br>";
#exit();


$rsmC = new ResumoController();


if(isset($_GET['acao']) && !empty($_GET['acao'])){
	$acao = $_GET['acao'];
}else{
	$acao = "";
}

switch ($acao) {
	case 'cadastrar':
			if (isset($_GET['operador']) && !empty($_GET['resumo'])){

					$turno = addslashes($_GET['turno']);
					$operador = addslashes($_GET['operador']);
					$data = array_reverse(explode('/', addslashes($_GET['data'])));
						$data = implode('-', $data);
					$resumo = addslashes($_GET['resumo']);

					$rsmC->cadastrarResumo($turno, $operador, $data, $resumo);
				
					header("Location: ../view/cad_resumo.php?msg=Resumo cadastrado com sucesso!");
				}

		break;
	case 'editar':
			if (isset($_GET['id']) && !empty($_GET['id'])){

				$id = addslashes($_GET['id']);
				$turno = addslashes($_GET['turno']);
				//$operador = $_GET['operador'];
				$data = array_reverse(explode('/', addslashes($_GET['data'])));
					$data = implode('-', $data);
				$resumo = addslashes($_GET['resumo']);

				//echo $operador;
				//exit();
				
				$rsmC->editarResumo($id, $turno, /*$operador,*/ $data, $resumo);

				header("Location: ../view/cad_resumo.php?msg=Resumo editado com sucesso!&id=".$id);
			}
		break;
	default:
		
		break;
}

class ResumoController{

	public function cadastrarResumo($turno, $operador, $data, $resumo){

			$t = $turno;
			$op = $operador;
			$dt = $data;
			$rsm = $resumo;

			$pdo = new Conexao();
			$resumo = new Resumo($pdo);

			$resumo->insertResumo($t, $op, $dt, $rsm);
	}

	public function listaResumos(){

			$pdo = new Conexao();
			$resumo = new Resumo($pdo);
			return $resumo->getResumos();
	}

	public function retornaResumo($id){
			$i = $id;
			$pdo = new Conexao();
			$resumo = new Resumo($pdo);
			return $resumo->getResumo($i);
	}

	public function editarResumo($id, $turno, /*$operador,*/ $data, $resumo){

			$i = $id;
			$t = $turno;
			//$op = $operador;
			$dt = $data;
			$rsm = $resumo;

			$pdo = new Conexao();
			$resumo = new Resumo($pdo);

			$resumo->editResumo($i, $t, /*$op,*/ $dt, $rsm);
	}
}




?>