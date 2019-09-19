  <?php 
 
session_start(); 

require '../autoload.php';

if (!$_SESSION['logon']){
    header("Location: login.php");
}

$resumoC = new ResumoController();
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
                                    Resumo's
                                </div>
                                
                                <div style="float: right; font-size: 2px">
                                    <button  style="font-size: 14px" class="btn btn-success" onclick="window.open('cad_resumo.php', '_self')"> <i class="fa fa-plus"></i> ADD</button>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30" style="margin-top: 10px;">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table id="listarResumo" class="table table-hover table-borderless table-data3 table-data3-add">
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
                                             <?php foreach($resumoC->listaResumos() as $rsm): ?>

                                                  <tr class="col-md-12">
                                                    <td style="font-weight: bold"><?= date('d/m/Y', strtotime($rsm['data'])); ?></td>

                                                    <td style="font-weight: bold"><?= $rsm['turno']; ?></td>

                                                    <td>
                                                        <?= $rsm['operador']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $rsm['resumo']; ?>
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

                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- END DATA TABLE-->

                            </div>
                        </div>
<script>
    $(document).ready(function(){  
      $('#listarChecklists').DataTable({
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