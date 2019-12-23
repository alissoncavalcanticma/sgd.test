<?php 

session_start(); 

require '../autoload.php';

if (!$_SESSION['logon']){
    header("Location: login.php");
}

$userC = new UsuarioController();
$checklistC = new ChecklistController();



if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $chk = $checklistC->retornaChecklist($id);
}else{

    $chk = $checklistC->ultimoRegistro();
}



?>

      <!-- MENU SIDEBAR-->
<?php include_once 'menu.php'; ?>
<!-- MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
        <?php include_once 'topo.php'; ?>
            <!-- HEADER DESKTOP-->
            
          <?php

          if(isset($_GET['msg']) && !empty($_GET['msg'])){
              $msg = $_GET['msg'];

          ?>
            <!-- Java Script -->
            
            <script type="text/javascript">
                Snackbar.show({
                  text: '<b><?= $msg ?></b>',
                  pos: 'top-center',
                  actionText: '',
                  backgroundColor: '#1476C6',

                });
            </script>

            <!-- Java Script -->

          <?php

            }

          ?>
          
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12" style="line-height:35px; margin-top:30px">
                                <div style="float: left;">
                                    <?= !isset($id) ? "Registrar Checklist" : "Editar Checklist" ?>
                                </div>
                                <!-- <div style="float: right;">
                                    <button class="btn btn-success" onclick="window.open('cad_acesso.php', '_self')"> <i class="fa fa-plus"></i> Acesso</button>
                                </div>
                            -->
                            </div>
                        </div>
                  <div class="row m-t-30" style="margin-top: 10px;">
                      <div class="col-md-12">
                          <!-- DATA TABLE-->
                          <div class="table-responsive m-b-40">
                                    
            <!-- Content -->
                <!-- MAIN CONTENT-->
                <div class="main-content" style="padding-top: 10px;">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                        
                            <div class="row">
                  
                                <div class="col-lg-12" style=" margin: auto;">
                                
                                <div class="div-cad-acesso">
                                  <div class="form-part form-part-button-form" style="padding-top: 10px">
                                    
                                    <button type="button" class="btn btn-primary" onclick="window.open('checklists.php', '_self')"><<<</button>
                                    </button>
                                    
                                    <div class="div-cad-checklist-int" style="padding-left: 70px">
                                    
                                   <!-- /# column -->
                                    <div class="col-lg-11">
                                       
                                            
                                            <div style="margin: auto; padding-left: 0px; padding-right: 0px">

                                                    <!-- CHECKLIST -->
                                                        <div class="tab-pane fade show active">
                                                             <p>
                                                                <?php
                                                                    include 'cad_checklist_form.php';
                                                                ?>
                                                              </p>
                                                        </div>
                                                        <!--END CHECKLIST -->
                                            </div>
                                            
                                        </div>
                                    
                                <!-- /# column -->

                                  </div>

                            </div>
                          </div>

                        </div>
                            
                       </div>

                     </div>
                        
                 </div>
              </div>
            </div>
        </div>
          <script type="text/javascript">
            $('#sbmt').click(function() { 
            
          }); 
          </script>
    </div>
<!-- End Content -->


                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

        <!-- RODAPÉ -->
<?php include_once 'rodape.php'; ?>
<!-- RODAPÉ -->