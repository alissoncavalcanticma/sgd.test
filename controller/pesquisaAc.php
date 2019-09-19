<?php

require '../autoload.php';

$pdo = new Conexao();

$requestData = $_REQUEST;

$columns = array(
    array( '0' => 'id' ),
    array( '1' => 'dc' ),
    array( '1' => 'turno' ),
    array( '2' => 'motivo' )
);
//sem pesquisa
$sql = "SELECT id, dc, turno, motivo FROM acessos";
$sql = $pdo->query($sql);
$qtd_linhas = mysql_num_rows($sql);

//com pesquisa
$sql1 = "SELECT id, dc, turno, motivo FROM acessos WHERE 1=1";
$sql1 = $pdo->query($sql);
$qtd_linhas = mysql_num_rows($sql1);

//ordenar dados a serem apresentados
$sql1.=" ORDER BY ".$columns[$requestData['order'][0]['columns']]."  ".$requestData['order'][0]['dir']." LIMIT".$requestData['start'].", ".$requestData['length']." ";

$sql1 = $pdo->prepare($sql);
$sql1 = $pdo->execute();

?>

13:56