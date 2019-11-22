  <?php

    session_start();

    require '../autoload.php';

    if (!$_SESSION['logon']) {
        header("Location: login.php");
    }

    $checklistC = new ChecklistController();
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
                              Checklist's
                          </div>

                          <div style="float: right">
                                    <div style="float: right;">
                                        <div style="float:left">
                                        <form name="form_search" id="form_search" method="post" action="">
                                                <fieldset>
                                                        <div class="input-prepend">
                                                            <span class="add-on"><i class="icon-search"></i></span>
                                                            <input type="text" name="search" id="search" tabindex="1" placeholder="Pesquisar..."/>
                                                        </div>
                                                </fieldset>
                                        </form>
                                        </div>
                                        <div style="float:right">
                                            <button style="font-size: 14px" class="btn btn-success" onclick="window.open('cad_checklist.php', '_self')"> <i class="fa fa-plus"></i> ADD</button>
                                        </div>
                                    </div>
                            </div>
                      </div>
                  </div>
                  <div class="row m-t-30" style="margin-top: 10px;">
                      <div class="col-md-12">
                          <!-- DATA TABLE-->
                          <div class="table-responsive m-b-40">

                                <div id="contentLoading">
                                    <div id="loading"></div>
                                </div>

                            <div class="jumbotron" style="padding:5px">

                              <table id="listarChecklists" class='table display table-hover table-borderless table-responsive table-data3' style="display: table">
                                
                                    <div id="tbody">
                                    </div>
                                    <br>
                              
                              </table>
                            
                            </div>

                          </div>
                          <hr />

                          <!-- END DATA TABLE-->

                      </div>
                  </div>
                  <!--
                  <script>
                      $(document).ready(function() {
                          $('#listarChecklists').DataTable({
                              "order": [
                                  [0, "desc"],
                              ], //or asc 
                              "columnDefs": [{
                                  "targets": 3,
                                  "type": "date-eu"
                              }],
                              "oLanguage": {
                                  "sProcessing": "Aguarde enquanto os dados são carregados ...",
                                  "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                                  "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                                  "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                                  "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                                  "sInfoFiltered": "",
                                  "sSearch": "Pesquisar: ",
                                  "oPaginate": {
                                      "sFirst": "Primeiro",
                                      "sPrevious": "Anterior",
                                      "sNext": "Próximo",
                                      "sLast": "Último"
                                  }
                              }
                          });
                      });
                  </script>
                    -->
                  <!-- RODAPÉ -->
                  <?php include_once 'rodape.php'; ?>
                  <!-- RODAPÉ -->