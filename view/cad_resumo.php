<?php 

session_start(); 

require '../autoload.php';

if (!$_SESSION['logon']){
    header("Location: login.php");
}

$userC = new UsuarioController();


if (isset($_GET['id']) && !empty($_GET['id'])) {
      $id = $_GET['id'];
      $rsmC = new ResumoController();
      $rsm = $rsmC->retornaResumo($id);
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

                                                    <!-- RESUMOS -->
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

                                                                            <option value="1" <?= isset($id) && $rsm['turno'] == '1' ? "selected"  : ""  ?>>Turno 1</option>

                                                                            <option value="2" <?= isset($id) && $rsm['turno'] == '2' ? "selected"  : ""  ?>>Turno 2</option>

                                                                            <option value="3" <?= isset($id) && $rsm['turno'] == '3' ? "selected"  : ""  ?>>Turno 3</option>
                                                                    </select>
                                                                </div>
                                                                <!-- END TURNO -->

                                                                <!-- OPERADOR -->
                                                                <div class="col-md-5" style="float: left; padding-left:110px; margin: auto">

                                                                <select id="operador" name="operador" style="background-color: #E9ECEF; font-weight: bold; font-size: 14px; border: 0px" class="form-control text-center" required oninvalid="setCustomValidity('Selecione o operador')" onchange="try{setCustomValidity('')}catch(e){}" <?php if(isset($_GET['id'])){ echo "disabled"; } ?>>
                                                                            
                                                                        <option value=""></option>

                                                                            <?php 
                                                                                
                                                                                
                                                                                if($_GET['id']){
                                                                                    $pesquisaStatus = "";
                                                                                }else{
                                                                                    $pesquisaStatus = "WHERE status = 'ativo'";
                                                                                }
                                                                                
                                                                                foreach ($userC->listaUsuarios($pesquisaStatus) as $user) :
                                                                                
                                                                                ?>
<?php //echo $user['id']; exit(); ?>        
                                                                                <option value="<?= $user['id'] ?>" <?php
        
                                                                                    //Lógica de edit
                                                                                    if(isset($id)){
                                                                                        if($rsm['operador'] == $user['id']){ 
                                                                                            echo "selected";
                                                                                        }    
                                                                                        //$uc = $userC->retornaApelido($rsm['operador']);
                                                                                        //if($user['apelido'] == $uc['apelido']){
                                                                                        //    echo "selected";
                                                                                        //}
                                                                                    //Lógica de add
                                                                                    }else{
                                                                                        if($user['apelido'] == $_SESSION['logon']){
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>><?php if(isset($_GET['id'])){
                                                                                        $uc = $userC->retornaApelido($rsm['operador']);
                                                                                        echo $uc['apelido'];
                                                                                    }else{
                                                                                        echo $user['apelido']; 
                                                                                    }
                                                                                    ?>
                                                                                </option>

                                                                            <?php endforeach; ?>

                                                                        </select>
                                                                    </div>

                                                                <!-- END OPERADOR -->
                                                                
                                                                <!-- DATA -->
                                                                <div class="col-md-3" style="float: right">
                                                                <?php
                                                                    date_default_timezone_set('America/Sao_Paulo');
                                                                    $data = date("d/m/Y", time());
                                                                ?>
                                                                <input type="datetime" id="data" name="data" class="form-control form-control-sm input-format-center" 
                                                                value="<?php
                                                                            if (isset($rsm['data'])) {
                                                                                $dt = array_reverse(explode('-', $rsm['data']));
                                                                                $dt = implode('/', $dt);
                                                                                echo $dt;
                                                                            } else {
                                                                                echo $data;
                                                                            }
                                                                        ?>" style="font-weight: bold; font-size: 14px; border: 0px" readonly>
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

                                                                <textarea 
                                                                   
                                                                    name="resumo" 
                                                                    id="resumo"
                                                                    placeholder="Resumo do turno" 
                                                                    class="form-control form-control-textarea" 
                                                                    style="width: 100%"
                                                                  
                                                                 ><?= isset($rsm['resumo']) ? $rsm['resumo'] : "" ?></textarea>
                                                        </div>
                                                        <?php 
                                                            
                                                            //echo $user['id']."<br>";
                                                            //echo $uc['apelido']."<br>";
                                                            //echo $rsm['operador']."<br>"; 
                                                            
                                                        ?>
                                                        <br>
                                                        
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