<?php 

session_start(); 

require '../autoload.php';

if (!$_SESSION['logon']){
    header("Location: login.php");
}

$userC = new UsuarioController();

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $acessoC = new AcessoController();
  $ac = $acessoC->retornaAcesso($id);
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
                                    Registrar acesso
                                </div>
                            </div>
                        </div>
                        
                  <div class="row m-t-30" style="margin-top: 10px;">
                  
                      <div class="col-md-12">                          
            <div class="table-responsive m-b-40">
                                    
            <!-- Content -->
            
                <!-- MAIN CONTENT-->

                        <!----> <!-- Jumbotron --> 
                        <div class="jumbotron jumbFormAccess" >
                          
                            <div class="row">
                                <div class="col-lg-12" style=" margin: auto;">
                                    <div class="div-cad-acesso">
                                        <div class="form-part form-part-button-form" style="padding-top: 10px">
                                            
                                            <button type="button" class="btn btn-primary" onclick="window.open('acessos.php', '_self')"><<<</button>
                                            </button>
                                        
                                        </div>
                                        <div class="">
                                        
                                        <!-- Include de Formulário de cadastro de acesso -->
                                        <?php include_once 'cad_acesso_form.php'; ?>
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!----> <!-- END Jumbotron --> 
                        
            </div>
                        <script type="text/javascript">

                                $('#sbmt').click(function() { }); 
                        
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