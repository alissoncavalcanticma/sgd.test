<?php
//conexão com banco de dados
require '../autoload.php';

$pdo = new Conexao();
$pdo->exec('SET NAMES utf8');


//pegando tipo de consulta: listagem ou contador
$tipo = $_GET['tipo'];
//se o tipo for listagem
if($tipo =='listagem'){
	$pag = $_GET['pag'];
	$maximo = $_GET['maximo'];
	$inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql

	$sql="SELECT * FROM acessos ORDER BY id DESC LIMIT $inicio, $maximo"; //consulta no BD
	$sql = $pdo->prepare($sql);
	$sql->execute();

	$ac = array();

	?>
	<table class="table display table-hover table-borderless table-responsive table-data3 minha-tabela" style="font-size: 13px">
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


	if ($sql->rowCount() > 0){


		foreach($sql->fetchAll() as $ac):

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
	                                 <i class="fa fa-edit" style=""></i>

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
?>