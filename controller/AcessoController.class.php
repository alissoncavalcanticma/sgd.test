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
	case 'listar':
			$acessoC->listaAcessos();
		break;
	case 'listarPesquisa':
			$acessoC->listarPesquisa($_GET['pag'], $_GET['maximo']);
		break;
	default:
		break;
}

class AcessoController{

	public function cadastrarAcesso(){

			$dc = addslashes($_GET['dc']);
			$turno = addslashes($_GET['turno']);
			$operador = addslashes($_GET['operador']);
			$operador_2 = isset($_GET['operador_2']) ? addslashes($_GET['operador_2']) : 0;
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

			
			//die($operador_2);

			$acesso->cadastrarAcesso($dc, $turno, $motivo, $servico, $equipamento, $obs, $solicitante, $empresa, $operador, $operador_2, $data, $entrada, $saida, $meio_de_contato, $solicitacao_acesso, $agendamento, $chegada, $area_atuacao);
	}

	public function listaAcessos(){

			$pdo = new Conexao();
			$acesso = new Acesso($pdo);

			//pegando tipo de consulta: listagem ou contador
			$tipo = $_GET['tipo'];
			//se o tipo for listagem
			if($tipo =='listagem'){

				$pag = $_GET['pag'];
				$maximo = $_GET['maximo'];

				$inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql

				$ac = array();
				$sql = $acesso->getAcessos($inicio, $maximo);

				//var_dump($sql);exit;

				?>
					<table class="table display table-striped table-condensed table-borderless table-responsive dt3 minha-tabela" style="font-size: 13px; width: 100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>DC</th>
								<th>Turno</th>
								<th>Motivo</th>
								<th>Solicitante</th>
								<th>Empresa</th>
								<th>Operador</th>
								<th style="width: 90px">Data</th>
								<th>Entrada</th>
								<th>Saída</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>

				<?php

				if (count($sql) > 0){


					foreach($sql as $ac):

					?>
						<tr style="line-height: 14px">
							<td><?= $ac['id']; ?></td>
							<td><?= $ac['dc']; ?></td>
							<td><?= $ac['turno']; ?></td>
							<td><?= $ac['motivo']; ?></td>
							<td><?= $ac['solicitante']; ?></td>
							<td><?= $ac['empresa']; ?></td>
							<td><?= $ac['operador']; ?></td>
							<td><?= $ac['data']; ?></td>
							<td><?= $ac['entrada']; ?></td>
							<td><?= $ac['saida']; ?></td>
							<td width="70px" style="margin:3px; padding-left: 10px; padding-right: 10px">
							<!--
								<a href='../controller/AcessoController.class.php?acao=editar&id=<?= $ac['id']; ?>'>
									<i class="fa fa-car"></i>
								</a>
							-->
								<div>
				                       <div style="float: left; width: 50%">
				                            <!--<a href="cad_acesso.php?id=<?= $ac['id']; ?>">-->
				                                <a href="#" onClick="window.open('resumoAcesso.php?id=<?= $ac['id']; ?>','Janela','toolbar=no,location=yes,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,fullscreen=no,width=650,height=400,left=260,top=150'); return false;"><i class="fa fa-share-square"></i>
				                                </a>

				                        </div>
				                        <div style="float: right; width: 50%">
				                            <a href="cad_acesso.php?id=<?= $ac['id']; ?>">
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
					echo("Nenhum cadastro encontrado");
				}

				?>
						</tbody>
					</table>

				<?php


				//se o tipo for contador
				}else if($tipo == 'contador'){

					$sql = "SELECT * FROM acessos"; //consulta no BD
					$sql = $pdo->prepare($sql);
					$sql->execute();
					$contador = $sql->rowCount(); //Pegando Quantidade de itens

					echo $contador;

				}else{

					echo "Solicitação inválida";
				}
			}
	//}
	//
	public function listarPesquisa($pg, $max){

			$pdo = new Conexao();
			$acesso = new Acesso($pdo);

			//pegando tipo de consulta: listagem ou contador
			$tipo = $_GET['tipo'];

			$pag = $pg;
			$maximo = $max;
			$inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql

				if(isset($_GET['search'])){
					$pesquisa = $_GET['search'];

				}else{
					$pesquisa = null;
				}

			

			//se o tipo for listagem
			if($tipo =='listagem'){

				$ac = array();
				$sql = $acesso->getPesquisa($inicio, $maximo, $pesquisa);

				//var_dump($sql);exit;

				?>
					<table class="table display table-striped table-condensed table-borderless table-responsive dt3 minha-tabela" style="font-size: 13px; width: 100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>DC</th>
								<th>Turno</th>
								<th>Motivo</th>
								<th>Solicitante</th>
								<th>Empresa</th>
								<th>Operador</th>
								<th style="width: 90px">Data</th>
								<th>Entrada</th>
								<th>Saída</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>

				<?php

				if (count($sql) > 0){


					foreach($sql as $ac):

					?>
						<tr style="line-height: 14px">
							<td><?= $ac['id']; ?></td>
							<td><?= $ac['dc']; ?></td>
							<td><?= $ac['turno']; ?></td>
							<td><?= $ac['motivo']; ?></td>
							<td><?= $ac['solicitante']; ?></td>
							<td><?= $ac['empresa']; ?></td>
							<td><?= $ac['operador']; ?></td>
							<td><?= $ac['data']; ?></td>
							<td><?= $ac['entrada']; ?></td>
							<td><?= $ac['saida']; ?></td>
							<td width="70px" style="margin:3px; padding-left: 10px; padding-right: 10px">
							<!--
								<a href='../controller/AcessoController.class.php?acao=editar&id=<?= $ac['id']; ?>'>
									<i class="fa fa-car"></i>
								</a>
							-->
								<div>
				                       <div style="float: left; width: 50%">
				                            <!--<a href="cad_acesso.php?id=<?= $ac['id']; ?>">-->
				                                <a href="#" onClick="window.open('resumoAcesso.php?id=<?= $ac['id']; ?>','Janela','toolbar=no,location=yes,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,fullscreen=no,width=650,height=400,left=260,top=150'); return false;"><i class="fa fa-share-square"></i>
				                                </a>

				                        </div>
				                        <div style="float: right; width: 50%">
				                            <a href="cad_acesso.php?id=<?= $ac['id']; ?>">
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
					echo("Nenhum cadastro encontrado");
				}

				?>
						</tbody>
					</table>

				<?php


				//se o tipo for contador
				//
				//se o tipo for contador
				}
				/*else if($tipo == 'contador'){
					if(isset($_GET['search'])){
						$param = $_GET['search'];
					}else{
						$param = null;
					}
					$sql = "SELECT * FROM acessos WHERE id LIKE '%$param%' OR dc LIKE '%$param%' OR turno LIKE '%$param%' OR motivo LIKE '%$param%' OR solicitante LIKE '%$param%' OR empresa LIKE '%$param%' OR operador LIKE '%$param%' OR data LIKE '%$param%' OR entrada LIKE '%$param%' OR saida LIKE '%$param%' ORDER BY id DESC LIMIT $inicio, $maximo"; //consulta no BD
					$sql = $pdo->prepare($sql);
					$sql->execute();
					$contador = $sql->rowCount(); //Pegando Quantidade de itens

					echo $contador;

				}else{

					echo "Solicitação inválida";
				}*/



				/*
				}else if($tipo == 'contador'){

					if(isset($_GET['search'])){
						$pesquisa = $_GET['search'];
					}else{
						$pesquisa = null;
					}
					$sql = $acesso->getPesquisa($inicio, $maximo, $pesquisa);
					//$sql = "SELECT * FROM acessos"; //consulta no BD
					$sql = $pdo->prepare($sql);
					$sql->execute();
					$contador = $sql->rowCount(); //Pegando Quantidade de itens

					echo $contador;

				}else{

					echo "Solicitação inválida";
				}*/
			}
	//}

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
			//$operador = addslashes($_GET['operador']);
			//$operador_2 = addslashes($_GET['operador_2']);
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

			$acesso->editAccess($i, $dc, $turno, $motivo, $servico, $equipamento, $obs, $solicitante, $empresa, /*$operador, $operador_2,*/ $data, $entrada, $saida, $meio_de_contato, $solicitacao_acesso, $agendamento, $chegada, $area_atuacao);
	}
}




?>