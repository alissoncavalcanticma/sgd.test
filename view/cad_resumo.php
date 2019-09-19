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
      #$acessoC = new AcessoController();
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
                                    <?= !isset($id) ? "Registrar Resumo" : "Editar Resumo" ?>
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
                                    
                                    <button type="button" class="btn btn-primary" onclick="window.open('resumos.php', '_self')"><<<</button>
                                    </button>
                                    
                                    <div class="div-cad-acesso-int">
                                    
                                   <!-- /# column -->
                                    <div class="col-lg-11">
                                       
                                            
                                            <div style="margin: auto; padding-left: 35px; padding-right: 35px">

                                                    <!-- CHECKLIST -->
                                                        <div class="tab-pane fade show active">
                                                     <p>
                                                    <!-- Form -->
                                                        <form action="../controller/ResumoController.class.php" method="get">

                                                        <div class="row" style="margin-bottom: 7px">
                                                            
                                                            <div class="col-md-12" style="background-color: #E9ECEF">
                                                            
                                                            <!-- TURNO -->
                                                                <div class="col-md-3" style="float: left">
                                                                    <select style="background-color: #E9ECEF; font-weight: bold; font-size: 14px; border: 0px" name="turno" class="form-control text-center"  required oninvalid="setCustomValidity('Selecione o turno')" onchange="try{setCustomValidity('')}catch(e){}">

                                                                            <option value="">Selecione o turno...</option>

                                                                            <option value="1" <?= isset($id) && $chk['turno'] == '1' ? "selected"  : ""  ?>>Turno 1</option>

                                                                            <option value="2" <?= isset($id) && $chk['turno'] == '2' ? "selected"  : ""  ?>>Turno 2</option>

                                                                            <option value="3" <?= isset($id) && $chk['turno'] == '3' ? "selected"  : ""  ?>>Turno 3</option>
                                                                    </select>
                                                                </div>
                                                                <!-- END TURNO -->

                                                                <!-- OPERADOR -->
                                                                <div class="col-md-3" style="float: left">

                                                                        <select style="margin-left: 100px; background-color: #E9ECEF; font-weight: bold; font-size: 14px; border: 0px" id="operador_fca" name="operador" class="form-control input-format-center">
                                                                            <option value=""></option>
                                                            
                                                                            <?php  foreach($userC->listaUsuarios() as $user): 
                                                                             ?>

                                                                            <option value="<?= $user['nome'] ?>" <?php 
                                                                                if(isset($id)){
                                                                                    if($chk['operador'] == $user['nome']){ 
                                                                                            echo "selected";
                                                                                        }       
                                                                                }else{
                                                                                    if($user['nome'] == $_SESSION['logon']){
                                                                                            echo "selected";
                                                                                        }       
                                                                                }?>>
                                                                                <?= $user['nome']; ?>
                                                              
                                                                            </option>

                                                                            <?php  endforeach; ?>

                                                                        </select>
                                                                    </div>
                                                                <!-- END OPERADOR -->

                                                                <!-- DATA -->
                                                                <div class="col-md-3" style="float: right">
                                                                <?php
                                                                      date_default_timezone_set('America/Sao_Paulo');
                                                                       $data = date("d/m/Y", time());
                                                                       
                                                                       if(isset($id)){
                                                                                    $dt = array_reverse(explode('-', $chk['data']));
                                                                                    $dt = implode('/', $dt);
                                                                        }
                                                                  ?>
                                                                  <input type="datetime"  id="data" name="data"
                                                                  class="form-control text-center"
                                                                  value="<?= isset($id) ? $dt : $data ?>" style="font-weight: bold; font-size: 14px; border: 0px" readonly>
                                                                </div>
                                                            
                                                            <!-- END DATA -->

                                                            </div>
                                                        </div>


                                                        <hr>
                                                        <!-- RESUMO DIÁRIO DE TURNO -->
                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF; color: #666666">
                                                                RESUMO DIÁRIO DE TURNO
                                                            </p>
                                                        </div>

                                                        <div class="row table-bordered">

                                                                <textarea name="resumo" id="resumo" placeholder="Detalhamento das observações de checklist do DC FCA" class="form-control form-control-textarea" style="width: 100%" ><?= "teste" ?></textarea>
                                                        </div>
                                                        <!-- END RESUMO DIÁRIO DE TURNO -->
                                                        
                                                        
                                                        <?= !isset($id) ? "<input type='hidden' name='acao' value='cadastrar'>" : "<input type='hidden' name='acao' value='editar'> <input type='hidden' name='id' value='$id'>" ?>
                                                        
                                                        <!-- BUTTON SUBMIT -->
                                                        <hr>
                                                        <div class="row">
                                                            <div class="form-part form-part-button-form" style="padding-bottom: 40px; clear:both; width: 100%;">
                                                                <button type="submit" class="btn btn-success" id="sbmt" onclick="myFunction()">
                                                                    <?= !isset($id) ? "Salvar" : "Editar" ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- END BUTTON SUBMIT -->

                                                        </form>
                                                        <!-- End Form -->
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
            <script>
                CKEDITOR.replace('resumo', {
                  // Define the toolbar groups as it is a more accessible solution.
                  toolbarGroups: [
                    { "name": "clipboard",   
                      "groups": ["undo", "clipboard" ] 
                    },
                    {
                      "name": "basicstyles",
                      "groups": ["basicstyles"]
                    },
                    {
                      "name": "styles",
                      "groups": ["styles"]
                    },
                    {
                      "name": "paragraph",
                      "groups": ["list"]
                    },
                    {
                      "name": "document",
                      "groups": ["mode"]
                    },
                  ],
                  // Remove the redundant buttons from toolbar groups defined above.
                  removeButtons: 'Format,Save,NewPage,Preview,Print,Font,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
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