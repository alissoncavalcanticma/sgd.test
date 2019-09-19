<?php

//require '../autoload.php';

//recebemos nosso parâmetro vindo do form
$param = isset($_POST['search']) ? $_POST['search'] : null;
$msg = "";
$limit = 50;
$inicio = 0;
$pg = 3;

echo "Página atual: ".$pg."</br>";
echo $inicio;


//começamos a concatenar nossa tabela
<table id='listarAcessos' class='table display table-hover table-borderless table-responsive table-data3 '>
<thead>
<tr>
<th>ID</th>
<th>DC</th>
<th>Turno</th>
<th>Motivo</th> 
<th>Solicitante</th>
<th>Empresa</th>
<th>Operador</th>
<th>Data</th>
<th>Entrada</th>
<th>Saída</th>
<th>View</th>
</tr>
</thead>
<tbody>

try {
    $pdo = new Conexao();
    $pdo->exec('SET NAMES utf8');

    if($param){
        $sql = "SELECT * FROM acessos WHERE id LIKE '%$param%' OR dc LIKE '%$param%' OR turno LIKE '%$param%' OR motivo LIKE '%$param%' OR solicitante LIKE '%$param%' OR empresa LIKE '%$param%' OR operador LIKE '%$param%' OR data LIKE '%$param%' OR entrada LIKE '%$param%' OR saida LIKE '%$param%' ORDER BY id DESC";
        $total_reg = $pdo->prepare($sql);
        $total_reg->execute();
        $total_reg = $total_reg->rowCount();
        $sql = "SELECT * FROM acessos WHERE id LIKE '%$param%' OR dc LIKE '%$param%' OR turno LIKE '%$param%' OR motivo LIKE '%$param%' OR solicitante LIKE '%$param%' OR empresa LIKE '%$param%' OR operador LIKE '%$param%' OR data LIKE '%$param%' OR entrada LIKE '%$param%' OR saida LIKE '%$param%' ORDER BY id DESC LIMIT $inicio, $limit";
    }else{
        $sql = "SELECT * FROM acessos ORDER BY id DESC";
        $total_reg = $pdo->prepare($sql);
        $total_reg->execute();
        $total_reg = $total_reg->rowCount();
        $sql = "SELECT * FROM acessos ORDER BY id DESC LIMIT $inicio, $limit";
    }
        $resultado = $pdo->prepare($sql);
        $resultado->execute();
        //$qtd_linhas = $resultado->rowCount();
        
        //echo $qtd_linhas."<br>";
        echo "Total de registros: ".$total_reg."<br>";
        $total_pg = ceil($total_reg / $limit);
        echo "Qtd_paginas: ".$total_pg;


    //$pdo->desconectar();

} catch (PDOException $e) {
    echo $e->getMessage();
}
//resgata os dados na tabela
if ($resultado->rowCount() > 0) {
    foreach ($resultado as $res) {

        $msg .= "                <tr>";
        $msg .= "                    <td>" . $res['id'] . "</td>";
        $msg .= "                    <td>" . $res['dc'] . "</td>";
        $msg .= "                    <td>" . $res['turno'] . "</td>";
        $msg .= "                    <td>" . $res['motivo'] . "</td>";
        $msg .= "                    <td>" . $res['solicitante'] . "</td>";
        $msg .= "                    <td>" . $res['empresa'] . "</td>";
        $msg .= "                    <td>" . $res['operador'] . "</td>";
        $msg .= "                    <td>" . $res['data'] . "</td>";
        $msg .= "                    <td>" . $res['entrada'] . "</td>";
        $msg .= "                    <td>" . $res['saida'] . "</td>";
        $msg .= '                    <td style="margin:2px; padding-left: 5px; padding-right: 10px">
                                            <div style="float: left; width: 50%">
                                                <a href="#" onClick="window.open("resumoAcesso.php?id='.$res["id"].'","toolbar=no,location=yes,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,fullscreen=no,width=650,height=400,left=260,top=150");return false;">
                                                    <i class="fa fa-share-square"></i>
                                                </a>
                                            </div>
                                            <div style="float: right; width: 50%">
                                                <a href="cad_acesso.php?id='.$res["id"].'">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                     </td>';

        $msg .= "                </tr>";
    }
} else {
    $msg = "";
    $msg .= "Nenhum resultado foi encontrado...";
}
$msg .= "    </tbody>";
$msg .= "</table>";

if($total_reg > $limit){

    $msg .= "<nav aria-label='Page navigation example'>";
    $msg .= "           <ul class='pagination'>";

    if($pg != 1){
        
        $msg .= "             <li class='page-item'><a class='page-link' href='#' onclick='mudaInicio($pg-1)'>Previous</a></li>";
    }
    /*for ($i = ($pg-1); $i < ($pg+3); $i++){

        //$msg .= "<li class='page-item'><a class='page-link' href='#' onclick='mudaInicio(".($inicio += $limit).")'>".intval($i + 1)."</a></li>";
        $msg .= "<li class='page-item'><a class='page-link' href='#' onclick='mudaInicio(".($i + $limit).")'>".intval($i + 1)."</a></li>";
    }*/

    $msg .= "                    <li class='page-item'><a class='page-link' href='#' onclick='mudaInicio($pg+1)'>Next = ".$pg."</a></li>";
    $msg .= "                </ul>";
    $msg .= "</nav>";
}

//retorna a msg concatenada
echo $msg;
