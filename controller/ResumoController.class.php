<?php

require '../autoload.php';


#echo $_GET['turno']."</br>";
#echo $_GET['operador']."</br>";
#echo $_GET['data']."</br></br>";
#echo $_GET['resumo']."</br>";
#exit();


$rsmC = new ResumoController();
$userC = new UsuarioController();


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
	case 'listar':
			$rsmC->listaResumos();
		break;
	case 'listarPesquisa':
			//$rsmC->listarPesquisa($_GET['pag'], $_GET['maximo']);
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

			//pegando tipo de consulta: listagem ou contador
			$tipo = $_GET['tipo'];
			//se o tipo for listagem
			if($tipo =='listagem'){

				$pag = $_GET['pag'];
				$maximo = $_GET['maximo'];

				$inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql

				$rs = array();
				$sql = $resumo->getResumos($inicio, $maximo);

				//return $resumo->getResumos();
				
				?>
					<table id="listarResumos" class="table table-hover table-borderless table-data3 table-data3-add">
						<thead>
							<tr>
								<th>Data</th>
								<th>Turno</th>
								<th>Operador</th>
								<th>Resumo</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
				<?php

				if (count($sql) > 0){

					foreach($sql as $rs):
				
				?>

					<tr class="col-md-12">

						<td style="font-weight: bold">
							<?= date('d/m/Y', strtotime($rs['data'])); ?>
						</td>

						<td style="font-weight: bold">
							<?= $rs['turno']; ?>
						</td>

						<td>
								<?php
									
										$uc = $userC->retornaApelido($rs['operador']);
										echo $uc['apelido'];
										
								?>
						</td>

						<td>
							<?= $rs['resumo']; ?>
						</td>

						<td style="margin:2px; padding-left: 5px; padding-right: 10px">
							<div>
								<div style="width: 50%">
									<a href="cad_resumo.php?id=<?= $rs['id']; ?>">
										<i class="fa fa-search" style=""></i>

									</a>
								</div>
							</div>
						</td>
					</tr>
					
					<?php
					
					endforeach;

		}else{

			//Se não retornar nada
			echo("Nenhum registro encontrado");
		}

		?>
					</tbody>
				</table>

				<?php


		//se o tipo for contador
		}else if($tipo == 'contador'){
			$sql = "SELECT * FROM resumos"; //consulta no BD
					$sql = $pdo->prepare($sql);
					$sql->execute();
					$contador = $sql->rowCount(); //Pegando Quantidade de itens

					echo $contador;
		}else{

			echo "Solicitação inválida";
		}
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