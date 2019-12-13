<?php

require '../autoload.php';

$checklistC = new ChecklistController();
$userC = new UsuarioController();


if(isset($_GET['acao']) && !empty($_GET['acao'])){
	$acao = $_GET['acao'];
}else{
	$acao = "";
}

switch ($acao) {
	case 'cadastrar':

			$checklistC->cadastrarChecklist();

			header("Location: ../view/cad_checklist.php?msg=Checklist cadastrado com sucesso!");

		break;
	case 'editar':
			if (isset($_GET['id']) && !empty($_GET['id'])){
				
				$checklistC->editarChecklist($_GET['id']);

				header("Location: ../view/cad_checklist.php?msg=Checklist editado com sucesso!&id=".$_GET['id']);
			}
		break;
	case 'listar':
			$checklistC->listarChecklists();
		break;
	case 'listarPesquisa':
			$checklistC->listarPesquisa($_GET['pag'], $_GET['maximo']);
		break;
	default:
		
		break;
}



class ChecklistController{

	public function cadastrarChecklist(){

			
			$turno = addslashes($_GET['turno']);

			$data = array_reverse(explode('/', addslashes($_GET['data'])));
			$data = implode('-', $data);

			$operador_fca = addslashes($_GET['operador_fca']);
			$operador_sp = addslashes($_GET['operador_sp']);
			$operador_tr = addslashes($_GET['operador_tr']);
			
			$entrada_fca = addslashes($_GET['entrada_fca']);
			$saida_fca = addslashes($_GET['saida_fca']);
			$entrada_sp = addslashes($_GET['entrada_sp']);
			$saida_sp = addslashes($_GET['saida_sp']);
			$entrada_tr = addslashes($_GET['entrada_tr']);
			$saida_tr = addslashes($_GET['saida_tr']);

			isset($_GET['racks_fca']) ? $racks_fca = addslashes($_GET['racks_fca']) : $racks_fca = "0";
			isset($_GET['racks_sp']) ? $racks_sp = addslashes($_GET['racks_sp']) : $racks_sp = "0";
			isset($_GET['racks_tr']) ? $racks_tr = addslashes($_GET['racks_tr']) : $racks_tr = "0";

			isset($_GET['org_fca']) ? $org_fca = addslashes($_GET['org_fca']) : $org_fca = "0";
			isset($_GET['org_sp']) ? $org_sp = addslashes($_GET['org_sp']) : $org_sp = "0";
			isset($_GET['org_tr']) ? $org_tr = addslashes($_GET['org_tr']) : $org_tr = "0";
			
			isset($_GET['lumin_fca']) ? $lumin_fca = addslashes($_GET['lumin_fca']) : $lumin_fca = "0";
			isset($_GET['lumin_sp']) ? $lumin_sp = addslashes($_GET['lumin_sp']) : $lumin_sp = "0";
			isset($_GET['lumin_tr']) ? $lumin_tr = addslashes($_GET['lumin_tr']) : $lumin_tr = "0";
			
			isset($_GET['infra_fca']) ? $infra_fca = addslashes($_GET['infra_fca']) : $infra_fca = "0";
			isset($_GET['infra_sp']) ? $infra_sp = addslashes($_GET['infra_sp']) : $infra_sp = "0";
			isset($_GET['infra_tr']) ? $infra_tr = addslashes($_GET['infra_tr']) : $infra_tr = "0";

			isset($_GET['acesso_fca']) ? $acesso_fca = addslashes($_GET['acesso_fca']) : $acesso_fca = "0";
			isset($_GET['acesso_sp']) ? $acesso_sp = addslashes($_GET['acesso_sp']) : $acesso_sp = "0";
			isset($_GET['acesso_tr']) ? $acesso_tr = addslashes($_GET['acesso_tr']) : $acesso_tr = "0";

			isset($_GET['portacf_fca']) ? $portacf_fca = addslashes($_GET['portacf_fca']) : $portacf_fca = "0";	
			isset($_GET['portacf_sp']) ? $portacf_sp = addslashes($_GET['portacf_sp']) : $portacf_sp = "0";	

			isset($_GET['arc_fca']) ? $arc_fca = addslashes($_GET['arc_fca']) : $arc_fca = "0";
			isset($_GET['arc_sp']) ? $arc_sp = addslashes($_GET['arc_sp']) : $arc_sp = "0";
			isset($_GET['arc_tr']) ? $arc_tr = addslashes($_GET['arc_tr']) : $arc_tr = "0";				

			isset($_GET['sist_extint_fca']) ? $sist_extint_fca = addslashes($_GET['sist_extint_fca']) : $sist_extint_fca = "0";
			isset($_GET['sist_extint_sp']) ? $sist_extint_sp = addslashes($_GET['sist_extint_sp']) : $sist_extint_sp = "0";
			isset($_GET['sist_extint_tr']) ? $sist_extint_tr = addslashes($_GET['sist_extint_tr']) : $sist_extint_tr = "0";			


			isset($_GET['ledsaude_fca']) ? $ledsaude_fca = addslashes($_GET['ledsaude_fca']) : $ledsaude_fca = "0";

			isset($_GET['temp01_fca']) ? $temp01_fca = addslashes($_GET['temp01_fca']) : $temp01_fca = "0";
			isset($_GET['temp02_fca']) ? $temp02_fca = addslashes($_GET['temp02_fca']) : $temp02_fca = "0";
			isset($_GET['temp03_fca']) ? $temp03_fca = addslashes($_GET['temp03_fca']) : $temp03_fca = "0";

			isset($_GET['humid01_fca']) ? $humid01_fca = addslashes($_GET['humid01_fca']) : $humid01_fca = "0";
			isset($_GET['humid02_fca']) ? $humid02_fca = addslashes($_GET['humid02_fca']) : $humid02_fca = "0";
			isset($_GET['humid03_fca']) ? $humid03_fca = addslashes($_GET['humid03_fca']) : $humid03_fca = "0";

			isset($_GET['temp01_sp']) ? $temp01_sp = addslashes($_GET['temp01_sp']) : $temp01_sp = "0";
			isset($_GET['temp02_sp']) ? $temp02_sp = addslashes($_GET['temp02_sp']) : $temp02_sp = "0";
			isset($_GET['temp03_sp']) ? $temp03_sp = addslashes($_GET['temp03_sp']) : $temp03_sp = "0";

			isset($_GET['humid01_sp']) ? $humid01_sp = addslashes($_GET['humid01_sp']) : $humid01_sp = "0";
			isset($_GET['humid02_sp']) ? $humid02_sp = addslashes($_GET['humid02_sp']) : $humid02_sp = "0";
			isset($_GET['humid03_sp']) ? $humid03_sp = addslashes($_GET['humid03_sp']) : $humid03_sp = "0";

			isset($_GET['cap_ups_tr']) ? $cap_ups_tr = addslashes($_GET['cap_ups_tr']) : $cap_ups_tr = "0";

			isset($_GET['lumin_sc_fca']) ? $lumin_sc_fca = addslashes($_GET['lumin_sc_fca']) : $lumin_sc_fca = "0";
			isset($_GET['portacf_sc_fca']) ? $portacf_sc_fca = addslashes($_GET['portacf_sc_fca']) : $portacf_sc_fca = "0";
			isset($_GET['acesso_sc_fca']) ? $acesso_sc_fca = addslashes($_GET['acesso_sc_fca']) : $acesso_sc_fca = "0";

			isset($_GET['geradores_fca']) ? $geradores_fca = addslashes($_GET['geradores_fca']) : $geradores_fca = "0";
			isset($_GET['geradores_sp']) ? $geradores_sp = addslashes($_GET['geradores_sp']) : $geradores_sp = "0";

			isset($_GET['org_ext_fca']) ? $org_ext_fca = addslashes($_GET['org_ext_fca']) : $org_ext_fca = "0";
			isset($_GET['org_ext_sp']) ? $org_ext_sp = addslashes($_GET['org_ext_sp']) : $org_ext_sp = "0";
			isset($_GET['org_ext_tr']) ? $org_ext_tr = addslashes($_GET['org_ext_tr']) : $org_ext_tr = "0";

			isset($_GET['zabbix']) ? $zabbix = addslashes($_GET['zabbix']) : $zabbix = "0";

			isset($_GET['obs_fca']) ? $obs_fca = addslashes($_GET['obs_fca']) : $obs_fca = "0";
			isset($_GET['obs_sp']) ? $obs_sp = addslashes($_GET['obs_sp']) : $obs_sp = "0";
			isset($_GET['obs_tr']) ? $obs_tr = addslashes($_GET['obs_tr']) : $obs_tr = "0";

			isset($_GET['chk_carro']) ? $chk_carro = addslashes($_GET['chk_carro']) : $chk_carro = "0";
			isset($_GET['chk_sala']) ? $chk_sala = addslashes($_GET['chk_sala']) : $chk_sala = "0";
			isset($_GET['chk_not']) ? $chk_not = addslashes($_GET['chk_not']) : $chk_not = "0";
			isset($_GET['chk_cel']) ? $chk_cel = addslashes($_GET['chk_cel']) : $chk_cel = "0";
			isset($_GET['chk_batcel']) ? $chk_batcel = addslashes($_GET['chk_batcel']) : $chk_batcel = "0";
			isset($_GET['obs_npo']) ? $obs_npo = addslashes($_GET['obs_npo']) : $obs_npo = "0";

			
			/**INC DC DR */
			
			$operador_dr = addslashes($_GET['operador_dr']);
			$entrada_dr = addslashes($_GET['entrada_dr']);
			$saida_dr = addslashes($_GET['saida_dr']);
			isset($_GET['racks_dr']) ? $racks_dr = addslashes($_GET['racks_dr']) : $racks_dr = "0";
			isset($_GET['org_dr']) ? $org_dr = addslashes($_GET['org_dr']) : $org_dr = "0";
			isset($_GET['lumin_dr']) ? $lumin_dr = addslashes($_GET['lumin_dr']) : $lumin_dr = "0";
			isset($_GET['infra_dr']) ? $infra_dr = addslashes($_GET['infra_dr']) : $infra_dr = "0";
			isset($_GET['acesso_dr']) ? $acesso_dr = addslashes($_GET['acesso_dr']) : $acesso_dr = "0";
			isset($_GET['portacf_dr']) ? $portacf_dr = addslashes($_GET['portacf_dr']) : $portacf_dr = "0";
			isset($_GET['arc_dr']) ? $arc_dr = addslashes($_GET['arc_dr']) : $arc_dr = "0";
			isset($_GET['sist_extint_dr']) ? $sist_extint_dr = addslashes($_GET['sist_extint_dr']) : $sist_extint_dr = "0";
			isset($_GET['ledsaude_dr']) ? $ledsaude_dr = addslashes($_GET['ledsaude_dr']) : $ledsaude_dr = "0";
			isset($_GET['temp_dr']) ? $temp_dr = addslashes($_GET['temp_dr']) : $temp_dr = "0";
			isset($_GET['humid_dr']) ? $humid_dr = addslashes($_GET['humid_dr']) : $humid_dr = "0";
			isset($_GET['org_ext_dr']) ? $org_ext_dr = addslashes($_GET['org_ext_dr']) : $org_ext_dr = "0";
			isset($_GET['obs_dr']) ? $obs_dr = addslashes($_GET['obs_dr']) : $obs_dr = "0";

			//echo $operador_dr."<br>";
			//echo $ledsaude_dr."<br>";
			//echo $obs_dr."<br>"; exit();

			$pdo = new Conexao();
			$checklist = new Checklist($pdo);

			$checklist->insertCheck($turno, $data, $operador_fca, $operador_sp, $operador_tr, $entrada_fca,
                                $saida_fca, $entrada_sp, $saida_sp, $entrada_tr, $saida_tr, $racks_fca,
                                $racks_sp, $racks_tr, $org_fca, $org_sp, $org_tr, $lumin_fca, $lumin_sp,
                                $lumin_tr, $infra_fca, $infra_sp, $infra_tr, $acesso_fca, $acesso_sp,
                                $acesso_tr, $portacf_fca, $portacf_sp, $arc_fca, $arc_sp, $arc_tr,
                                $sist_extint_fca, $sist_extint_sp, $sist_extint_tr, $ledsaude_fca,
                                $temp01_fca, $humid01_fca, $temp01_sp, $humid01_sp, $temp02_fca,
                                $humid02_fca, $temp02_sp, $humid02_sp, $temp03_fca, $humid03_fca,
                                $temp03_sp, $humid03_sp, $cap_ups_tr, $lumin_sc_fca, $portacf_sc_fca,
                                $acesso_sc_fca, $geradores_fca, $geradores_sp, $org_ext_fca, $org_ext_sp,
                                $org_ext_tr, $zabbix, $obs_fca, $obs_sp, $obs_tr, $chk_carro, $chk_sala,
								$chk_not, $chk_cel, $chk_batcel, $obs_npo, 
								$operador_dr, $entrada_dr, $saida_dr, $racks_dr, $org_dr, $lumin_dr, $infra_dr, 
								$acesso_dr, $portacf_dr, $arc_dr, $sist_extint_dr, $ledsaude_dr, $temp_dr,
                                $humid_dr, $org_ext_dr, $obs_dr);

	}

	public function listarChecklists(){

			$pdo = new Conexao();
			$checklist = new Checklist($pdo);
			
			//pegando tipo de consulta: listagem ou contador
			$tipo = $_GET['tipo'];
			//se o tipo for listagem
			if($tipo =='listagem'){

				$pag = $_GET['pag'];
				$maximo = $_GET['maximo'];

				$inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql

				$chk = array();
				$sql = $checklist->getChecks($inicio, $maximo);
			
				//return $checklist->getChecks();

				?>
					<table class="table display table-striped table-condensed table-borderless table-responsive dt3 tab-chk minha-tabela" style="font-size: 13px; width: 100%">
						<thead>
						<tr>
							<!--TH hidden para ordenação -->
							<!-- <th style="display:none;">ID</th> -->
							<!--<th>ID</th>-->
							<th style="min-width:50px">Data</th>
							<th style="min-width:50px">Turno</th>
							<th style="min-width:180px">OBS DC FCA</th>
							<th style="min-width:180px">OBS DC SP</th>
							<th style="min-width:180px">OBS DC DR</th>
							<th style="min-width:180px">OBS Sala Técnica</th>
							<th style="min-width:130px">OBS NPO</th>
							<th>View</th>
						</tr>
					</thead>
					<tbody>

				<?php

					if (count($sql) > 0){

					foreach($sql as $chk):

				?>

					<tr class="col-md-12">
							<!--<td style="font-weight: bold"><?php //echo $chk['id'] ?></td>-->
							<td style="font-weight: bold; padding-right: 0px; padding-left: 8px"><?= date('d/m/Y', strtotime($chk['data'])); ?></td>
							<td style="font-weight: bold"><?= $chk['turno']; ?></td>
							<td>
								<ol style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_fca']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ol>
							</td>
							<td style="padding-right:15px; padding-left: 15px">
								<ol style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_sp']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ol>
							</td>
							<td style="padding-right:15px; padding-left: 15px">
								<ol style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_dr']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ol>
							</td>
							<td style="padding-right:15px; padding-left: 15px">
								<ol style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_tr']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ol>
							</td>
							<td>
								<ol style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_npo']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ol>
							</td>
							<td style="margin:2px; padding-left: 5px; padding-right: 5px">
								<div>
									<div style="width: 50%">
										<a href="cad_checklist.php?id=<?= $chk['id']; ?>">
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
			$sql = "SELECT * FROM checklists"; //consulta no BD
					$sql = $pdo->prepare($sql);
					$sql->execute();
					$contador = $sql->rowCount(); //Pegando Quantidade de itens

					echo $contador;
			}else{

			echo "Solicitação inválida";
			
			}
	}

	public function listarPesquisa($pg, $max){

		$pdo = new Conexao();
		$checklist = new Checklist($pdo);
		$userC = new UsuarioController();

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
			
			$chk = array();
			$sql = $checklist->getPesquisa($inicio, $maximo, $pesquisa);

			?>

					<table class="table display table-striped table-condensed table-borderless table-responsive dt3 minha-tabela" style="font-size: 13px; width: 100%">
						<thead>
						<tr>
							<!--TH hidden para ordenação -->
							<!-- <th style="display:none;">ID</th> -->
							<th>ID</th>
							<th>Data</th>
							<th>Turno</th>
							<th>OBS DC FCA</th>
							<th>OBS DC SP</th>
							<th>OBS Sala Técnica</th>
							<th>OBS NPO</th>
							<th>View</th>
						</tr>
					</thead>
					<tbody>

				<?php

					if (count($sql) > 0){

					foreach($sql as $chk):

				?>

					<tr class="col-md-12">
							<td style="font-weight: bold"><?= $chk['id'] ?></td>
							<td style="font-weight: bold"><?= date('d/m/Y', strtotime($chk['data'])); ?></td>
							<td style="font-weight: bold"><?= $chk['turno']; ?></td>
							<td>
								<ul style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_fca']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ul>
							</td>
							<td>
								<ul style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_sp']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ul>
							</td>
							<td>
								<ul style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_tr']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ul>
							</td>
							<td>
								<ul style="line-height:15px">
									<?php

										$result = explode(';', $chk['obs_npo']);
										foreach ($result as $value) {
											echo "<li>" . $value . "</li>";
										}

										?>
								</ul>
							</td>
							<td style="margin:2px; padding-left: 5px; padding-right: 10px">
								<div>
									<div style="width: 50%">
										<a href="cad_checklist.php?id=<?= $chk['id']; ?>">
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

		}
	}

	

	public function editarChecklist($id){

			$i = addslashes($id);
			$turno = addslashes($_GET['turno']);

			$data = array_reverse(explode('/', addslashes($_GET['data'])));
			$data = implode('-', $data);

			$operador_fca = addslashes($_GET['operador_fca']);
			$operador_sp = addslashes($_GET['operador_sp']);
			$operador_tr = addslashes($_GET['operador_tr']);
			
			$entrada_fca = addslashes($_GET['entrada_fca']);
			$saida_fca = addslashes($_GET['saida_fca']);
			$entrada_sp = addslashes($_GET['entrada_sp']);
			$saida_sp = addslashes($_GET['saida_sp']);
			$entrada_tr = addslashes($_GET['entrada_tr']);
			$saida_tr = addslashes($_GET['saida_tr']);

			isset($_GET['racks_fca']) ? $racks_fca = addslashes($_GET['racks_fca']) : $racks_fca = "0";
			isset($_GET['racks_sp']) ? $racks_sp = addslashes($_GET['racks_sp']) : $racks_sp = "0";
			isset($_GET['racks_tr']) ? $racks_tr = addslashes($_GET['racks_tr']) : $racks_tr = "0";

			isset($_GET['org_fca']) ? $org_fca = addslashes($_GET['org_fca']) : $org_fca = "0";
			isset($_GET['org_sp']) ? $org_sp = addslashes($_GET['org_sp']) : $org_sp = "0";
			isset($_GET['org_tr']) ? $org_tr = addslashes($_GET['org_tr']) : $org_tr = "0";
			
			isset($_GET['lumin_fca']) ? $lumin_fca = addslashes($_GET['lumin_fca']) : $lumin_fca = "0";
			isset($_GET['lumin_sp']) ? $lumin_sp = addslashes($_GET['lumin_sp']) : $lumin_sp = "0";
			isset($_GET['lumin_tr']) ? $lumin_tr = addslashes($_GET['lumin_tr']) : $lumin_tr = "0";
			
			isset($_GET['infra_fca']) ? $infra_fca = addslashes($_GET['infra_fca']) : $infra_fca = "0";
			isset($_GET['infra_sp']) ? $infra_sp = addslashes($_GET['infra_sp']) : $infra_sp = "0";
			isset($_GET['infra_tr']) ? $infra_tr = addslashes($_GET['infra_tr']) : $infra_tr = "0";

			isset($_GET['acesso_fca']) ? $acesso_fca = addslashes($_GET['acesso_fca']) : $acesso_fca = "0";
			isset($_GET['acesso_sp']) ? $acesso_sp = addslashes($_GET['acesso_sp']) : $acesso_sp = "0";
			isset($_GET['acesso_tr']) ? $acesso_tr = addslashes($_GET['acesso_tr']) : $acesso_tr = "0";

			isset($_GET['portacf_fca']) ? $portacf_fca = addslashes($_GET['portacf_fca']) : $portacf_fca = "0";	
			isset($_GET['portacf_sp']) ? $portacf_sp = addslashes($_GET['portacf_sp']) : $portacf_sp = "0";	

			isset($_GET['arc_fca']) ? $arc_fca = addslashes($_GET['arc_fca']) : $arc_fca = "0";
			isset($_GET['arc_sp']) ? $arc_sp = addslashes($_GET['arc_sp']) : $arc_sp = "0";
			isset($_GET['arc_tr']) ? $arc_tr = addslashes($_GET['arc_tr']) : $arc_tr = "0";				

			isset($_GET['sist_extint_fca']) ? $sist_extint_fca = addslashes($_GET['sist_extint_fca']) : $sist_extint_fca = "0";
			isset($_GET['sist_extint_sp']) ? $sist_extint_sp = addslashes($_GET['sist_extint_sp']) : $sist_extint_sp = "0";
			isset($_GET['sist_extint_tr']) ? $sist_extint_tr = addslashes($_GET['sist_extint_tr']) : $sist_extint_tr = "0";			


			isset($_GET['ledsaude_fca']) ? $ledsaude_fca = addslashes($_GET['ledsaude_fca']) : $ledsaude_fca = "0";

			isset($_GET['temp01_fca']) ? $temp01_fca = addslashes($_GET['temp01_fca']) : $temp01_fca = "0";
			isset($_GET['temp02_fca']) ? $temp02_fca = addslashes($_GET['temp02_fca']) : $temp02_fca = "0";
			isset($_GET['temp03_fca']) ? $temp03_fca = addslashes($_GET['temp03_fca']) : $temp03_fca = "0";

			isset($_GET['humid01_fca']) ? $humid01_fca = addslashes($_GET['humid01_fca']) : $humid01_fca = "0";
			isset($_GET['humid02_fca']) ? $humid02_fca = addslashes($_GET['humid02_fca']) : $humid02_fca = "0";
			isset($_GET['humid03_fca']) ? $humid03_fca = addslashes($_GET['humid03_fca']) : $humid03_fca = "0";

			isset($_GET['temp01_sp']) ? $temp01_sp = addslashes($_GET['temp01_sp']) : $temp01_sp = "0";
			isset($_GET['temp02_sp']) ? $temp02_sp = addslashes($_GET['temp02_sp']) : $temp02_sp = "0";
			isset($_GET['temp03_sp']) ? $temp03_sp = addslashes($_GET['temp03_sp']) : $temp03_sp = "0";

			isset($_GET['humid01_sp']) ? $humid01_sp = addslashes($_GET['humid01_sp']) : $humid01_sp = "0";
			isset($_GET['humid02_sp']) ? $humid02_sp = addslashes($_GET['humid02_sp']) : $humid02_sp = "0";
			isset($_GET['humid03_sp']) ? $humid03_sp = addslashes($_GET['humid03_sp']) : $humid03_sp = "0";

			isset($_GET['cap_ups_tr']) ? $cap_ups_tr = addslashes($_GET['cap_ups_tr']) : $cap_ups_tr = "0";

			isset($_GET['lumin_sc_fca']) ? $lumin_sc_fca = addslashes($_GET['lumin_sc_fca']) : $lumin_sc_fca = "0";
			isset($_GET['portacf_sc_fca']) ? $portacf_sc_fca = addslashes($_GET['portacf_sc_fca']) : $portacf_sc_fca = "0";
			isset($_GET['acesso_sc_fca']) ? $acesso_sc_fca = addslashes($_GET['acesso_sc_fca']) : $acesso_sc_fca = "0";

			isset($_GET['geradores_fca']) ? $geradores_fca = addslashes($_GET['geradores_fca']) : $geradores_fca = "0";
			isset($_GET['geradores_sp']) ? $geradores_sp = addslashes($_GET['geradores_sp']) : $geradores_sp = "0";

			isset($_GET['org_ext_fca']) ? $org_ext_fca = addslashes($_GET['org_ext_fca']) : $org_ext_fca = "0";
			isset($_GET['org_ext_sp']) ? $org_ext_sp = addslashes($_GET['org_ext_sp']) : $org_ext_sp = "0";
			isset($_GET['org_ext_tr']) ? $org_ext_tr = addslashes($_GET['org_ext_tr']) : $org_ext_tr = "0";

			isset($_GET['zabbix']) ? $zabbix = addslashes($_GET['zabbix']) : $zabbix = "0";

			isset($_GET['obs_fca']) ? $obs_fca = addslashes($_GET['obs_fca']) : $obs_fca = "0";
			isset($_GET['obs_sp']) ? $obs_sp = addslashes($_GET['obs_sp']) : $obs_sp = "0";
			isset($_GET['obs_tr']) ? $obs_tr = addslashes($_GET['obs_tr']) : $obs_tr = "0";

			isset($_GET['chk_carro']) ? $chk_carro = addslashes($_GET['chk_carro']) : $chk_carro = "0";
			isset($_GET['chk_sala']) ? $chk_sala = addslashes($_GET['chk_sala']) : $chk_sala = "0";
			isset($_GET['chk_not']) ? $chk_not = addslashes($_GET['chk_not']) : $chk_not = "0";
			isset($_GET['chk_cel']) ? $chk_cel = addslashes($_GET['chk_cel']) : $chk_cel = "0";
			isset($_GET['chk_batcel']) ? $chk_batcel = addslashes($_GET['chk_batcel']) : $chk_batcel = "0";
			isset($_GET['obs_npo']) ? $obs_npo = addslashes($_GET['obs_npo']) : $obs_npo = "0";

			/**INC DC DR */
		
			$operador_dr = addslashes($_GET['operador_dr']);
			$entrada_dr = addslashes($_GET['entrada_dr']);
			$saida_dr = addslashes($_GET['saida_dr']);
			isset($_GET['racks_dr']) ? $racks_dr = addslashes($_GET['racks_dr']) : $racks_dr = "0";
			isset($_GET['org_dr']) ? $org_dr = addslashes($_GET['org_dr']) : $org_dr = "0";
			isset($_GET['lumin_dr']) ? $lumin_dr = addslashes($_GET['lumin_dr']) : $lumin_dr = "0";
			isset($_GET['infra_dr']) ? $infra_dr = addslashes($_GET['infra_dr']) : $infra_dr = "0";
			isset($_GET['acesso_dr']) ? $acesso_dr = addslashes($_GET['acesso_dr']) : $acesso_dr = "0";
			isset($_GET['portacf_dr']) ? $portacf_dr = addslashes($_GET['portacf_dr']) : $portacf_dr = "0";
			isset($_GET['arc_dr']) ? $arc_dr = addslashes($_GET['arc_dr']) : $arc_dr = "0";
			isset($_GET['sist_extint_dr']) ? $sist_extint_dr = addslashes($_GET['sist_extint_dr']) : $sist_extint_dr = "0";
			isset($_GET['ledsaude_dr']) ? $ledsaude_dr = addslashes($_GET['ledsaude_dr']) : $ledsaude_dr = "0";
			isset($_GET['temp_dr']) ? $temp_dr = addslashes($_GET['temp_dr']) : $temp_dr = "0";
			isset($_GET['humid_dr']) ? $humid_dr = addslashes($_GET['humid_dr']) : $humid_dr = "0";
			isset($_GET['org_ext_dr']) ? $org_ext_dr = addslashes($_GET['org_ext_dr']) : $org_ext_dr = "0";
			isset($_GET['obs_dr']) ? $obs_dr = addslashes($_GET['obs_dr']) : $obs_dr = "0";


			$pdo = new Conexao();
			$checklist = new Checklist($pdo);

			$checklist->editCheck($i, $turno, $data, $operador_fca, $operador_sp, $operador_tr, $entrada_fca,
                                $saida_fca, $entrada_sp, $saida_sp, $entrada_tr, $saida_tr, $racks_fca,
                                $racks_sp, $racks_tr, $org_fca, $org_sp, $org_tr, $lumin_fca, $lumin_sp,
                                $lumin_tr, $infra_fca, $infra_sp, $infra_tr, $acesso_fca, $acesso_sp,
                                $acesso_tr, $portacf_fca, $portacf_sp, $arc_fca, $arc_sp, $arc_tr,
                                $sist_extint_fca, $sist_extint_sp, $sist_extint_tr, $ledsaude_fca,
                                $temp01_fca, $humid01_fca, $temp01_sp, $humid01_sp, $temp02_fca,
                                $humid02_fca, $temp02_sp, $humid02_sp, $temp03_fca, $humid03_fca,
                                $temp03_sp, $humid03_sp, $cap_ups_tr, $lumin_sc_fca, $portacf_sc_fca,
                                $acesso_sc_fca, $geradores_fca, $geradores_sp, $org_ext_fca, $org_ext_sp,
                                $org_ext_tr, $zabbix, $obs_fca, $obs_sp, $obs_tr, $chk_carro, $chk_sala,
								$chk_not, $chk_cel, $chk_batcel, $obs_npo,
								$operador_dr, $entrada_dr, $saida_dr, $racks_dr, $org_dr, $lumin_dr, $infra_dr, 
								$acesso_dr, $portacf_dr, $arc_dr, $sist_extint_dr, $ledsaude_dr, $temp_dr,
                                $humid_dr, $org_ext_dr, $obs_dr);

	}

	public function retornaChecklist($id){
			$i = $id;
			$pdo = new Conexao();
			$checklist = new Checklist($pdo);
			return $checklist->getCheck($i);

	}
	public function ultimoRegistro(){

		$pdo = new Conexao();
		$checklist = new Checklist($pdo);
		return $checklist->getLastReg();
	}
}




?>