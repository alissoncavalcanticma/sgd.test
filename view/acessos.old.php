<?php 
 
session_start(); 

require '../autoload.php';

if (!$_SESSION['logon']){
    header("Location: login.php");
}

$acessoC = new AcessoController();
$userC = new UsuarioController();

 ?>

      <!-- MENU SIDEBAR-->
<?php include_once 'menu.php'; ?>
<!-- MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
        <?php include_once 'topo.php'; ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            

            <!-- modal scroll -->
            
            <!-- end modal scroll -->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12" style="line-height:35px; margin-top:30px">
                                <div style="float: left;">
                                    Acessos
                                </div>
                                <div style="float: right">
                                    <div style="float: right;">
                                        <button style="font-size: 14px" class="btn btn-success" onclick="window.open('cad_acesso.php', '_self')"> <i class="fa fa-plus"></i> ADD</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30" style="margin-top: 10px;">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table id="listarAcessos" class="table table-hover table-responsive table-borderless table-data3" style="display: table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>DC</th>
                                                <th>Turno</th>
                                                <th>Motivo</th>       
                                                <!--<th>Serviço</th> -->
                                                <!--<th>Equipamento</th>-->
                                                <!--<th>Obs</th>-->
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
                                             <?php foreach($acessoC->listaAcessos() as $ac): ?>

                                                  <tr>
                                                    <td style="font-weight: bold"><?= $ac['id']; ?></td>
                                                    <td><?= $ac['dc']; ?></td>
                                                    <td><?= $ac['turno']; ?></td>
                                                    <td><?= $ac['motivo']; ?></td>
                                                    <!--<td><?= $ac['servico']; ?></td>-->
                                                    <!--<td><?= $ac['equipamento']; ?></td>-->
                                                    <!--<td><?= $ac['obs']; ?></td>-->
                                                    <td><?= $ac['solicitante']; ?></td>
                                                    <td><?= $ac['empresa']; ?></td>
                                                    <td><?= $ac['operador']; ?></td>
                                                    <td><?= date('d/m/y', strtotime($ac['data'])); ?></td>
                                                    <td><?= $ac['entrada']; ?></td>
                                                    <td><?= $ac['saida']; ?></td>
                                                    <td style="margin:2px; padding-left: 5px; padding-right: 10px">
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

                                                        <!--
                                                            <button id="view_edit_modal" type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#scrollmodal" onclick="abrirModal('<?= $ac['id']; ?>')"> <i class="fa fa-search"></i></button>
                                                        -->

                                                    </td>

                                                    <!--
                                                    <td>
                                                        <button type="button" class="btn btn-success">
                                                          <i class="fa fa-edit"></i>
                                                        </button>  
                                                    </td>          
                                                    <td>
                                                        <button type="button" class="btn btn-danger">
                                                          <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                  -->                      
                                                    <!-- <td><?= $ac['meio_de_contato']; ?></td>
                                                    <td><?= $ac['solicitacao_acesso']; ?></td>
                                                    <td><?= $ac['agendamento']; ?></td>
                                                    <td><?= $ac['chegada']; ?></td>
                                                    <td class="last"><?= $ac['area_atuacao']; ?></td>
                                                  -->
                                                  </tr>

                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->

                            </div>
                        </div>
 <script>
 $(document).ready(function(){  
      $('#listarAcessos').DataTable({
    "order": [[ 0, "desc" ]], //or asc 
    "columnDefs" : [{"targets":3, "type":"date-eu"}],
    "oLanguage": {
    "sProcessing": "Aguarde enquanto os dados são carregados ...",
    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
    "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
    "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
    "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
    "sInfoFiltered": "",
    "sSearch": "Pesquisar: ",
    "oPaginate": {
       "sFirst":    "Primeiro",
       "sPrevious": "Anterior",
       "sNext":     "Próximo",
       "sLast":     "Último"
        }
    }  
    }); 
 }); 
 </script>
        <!-- RODAPÉ -->
<?php include_once 'rodape.php'; ?>
<!-- RODAPÉ -->