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
                                    
                                    <button type="button" class="btn btn-primary" onclick="window.open('acessos.php', '_self')"><<<</button>
                                    </button>
                                   
                                  </div>
                                  <div class="div-cad-acesso-int cad">
                                  <!-- -->

                            <!-- Form -->

                            <form action="../controller/AcessoController.class.php" method="get">
                                <div class="form-part">
                                    <!-- DATA -->
                                    <div class="col-md-3 form-part-ext">
                                            <label>Data:</label>
                                                  <?php 
                                                      date_default_timezone_set('America/Sao_Paulo');
                                                       $data = date("d/m/Y", time()); 
                                                  ?>
                                                  <input type="datetime"  id="data" name="data" 
                                                  class="form-control form-control-sm input-format-center" 
                                                  value="<?php 
                                                              if(isset($ac['data'])){ 
                                                                $dt = array_reverse(explode('-', $ac['data']));
                                                                $dt = implode('/', $dt);
                                                                echo $dt; 
                                                              }else{ 
                                                                echo $data; 
                                                              } 
                                                          ?>" readonly>

                                                  <!-- <input type="hidden" name="data" value="<?=$data?>"> -->
                                    </div>
                                    <!-- END DATA -->
                                    <!-- MEIO DE CONTATO -->

                                    <div class="col-2 form-part-horizontal">
                                            <label>Meio de contato:</label>
                                            <select name="meio_de_contato" class="form-control form-control-sm input-format-center">
                                                    <option value=""></option>

                                                    <option value="E-mail" <?= isset($ac['meio_de_contato']) && $ac['meio_de_contato'] == 'E-mail' ? "selected"  : ""  ?>>E-mail</option>

                                                    <option value="Telefone" <?= isset($ac['meio_de_contato']) && $ac['meio_de_contato'] == 'Telefone' ? "selected"  : ""  ?>>Telefone</option>

                                                    <option value="Presencial" <?= isset($ac['meio_de_contato']) && $ac['meio_de_contato'] == 'Presencial' ? "selected"  : ""  ?>>Presencial</option>

                                                    <option value="Outros" <?= isset($ac['meio_de_contato']) && $ac['meio_de_contato'] == 'Outros' ? "selected"  : ""  ?>>Outros</option>

                                            </select>
                                    </div>
                                    
                                    <!-- END MEIO DE CONTATO -->
                                    <!-- SOLICITAÇÃO -->
                                            
                                    <div class="col-3 form-part-horizontal">
                                        <label>Hora da solicitação:</label>
                                            <input name="solicitacao_acesso" type="time" class="form-control form-control-sm input-format-center" value="<?= isset($ac['solicitacao_acesso']) ? $ac['solicitacao_acesso']  : ''  ?>">
                                    </div> 

                                    <!-- END SOLICITAÇÃO -->
                                    <!-- DC -->

                                    <div class="col-md-2 form-part-ext">
                                            <label>DC:</label>
                                            <select name="dc" class="form-control form-control-sm input-format-center" autofocus="autofocus" required oninvalid="setCustomValidity('Selecione o Datacenter')" onchange="try{setCustomValidity('')}catch(e){}">
                                                      
                                                      <option value=""></option>

                                                      <option value="FCA" <?= isset($ac['dc']) && $ac['dc'] == 'FCA' ? "selected"  : ""  ?>>FCA</option>

                                                      <option value="SP" <?= isset($ac['dc']) && $ac['dc'] == 'SP' ? "selected"  : ""  ?>>SP</option>

                                                      <option value="TR" <?= isset($ac['dc']) && $ac['dc'] == 'TR' ? "selected"  : ""  ?>>TR</option>

                                              </select>
                                    </div>

                                    <!-- END DC -->
                                    <!-- SOLICITANTE -->
                                    <div class="col-3  form-part-horizontal">
                                            <label>Solicitante</label>
                                            <input name="solicitante" type="text" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('informe quem solicitou o acesso')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= isset($ac) ? $ac['solicitante'] : '' ?>">
                                    </div>
                                    <!-- END SOLICITANTE -->
                                    <!-- EMPRESA -->
                                    <div class="col-3 form-part-horizontal">
                                        <label>Empresa</label>
                                            <input name="empresa" type="text" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Informe a empresa do solicitante')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= isset($ac) ? $ac['empresa'] : '' ?>">
                                    </div>
                                    <!-- END EMPRESA -->
                                    <!-- AGENDADO -->
                                    <div class="form-part" style="clear: both; margin-left: 60px">
                                        <div class="col-3 form-part-horizontal">
                                            <label>Agendado para:</label>
                                                <input name="agendamento" type="time" class="form-control form-control-sm input-format-center" value="<?= isset($ac['agendamento']) ? $ac['agendamento']  : ''  ?>">
                                        </div>
                                    </div>
                                    <!-- END AGENDADO -->
                                    
                                </div>
                                <!-- MOTIVO -->            
                                <div class="form-part" style="clear:both">
                                    <label>Motivo:</label>
                                    <textarea name="motivo" id="textarea-input" placeholder="Descreva o motivo do acesso" class="form-control form-control-sm form-control-textarea" required oninvalid="setCustomValidity('Descreva o motivo do acesso')" onchange="try{setCustomValidity('')}catch(e){}"><?= isset($ac['motivo']) ? $ac['motivo'] : '' ?></textarea>
                                </div>
                                <!-- END MOTIVO -->
                                <!-- CHEGADA -->
                                <div class="col-3  form-part-horizontal">
                                        <label>Chegada:</label>
                                        <input name="chegada" type="time" class="form-control form-control-sm input-format-center" value="<?= isset($ac['chegada']) ? $ac['chegada']  : ''  ?>">
                                </div>
                                <!-- END CHEGADA -->
                                <!-- ENTRADA -->
                                <div class="col-3 form-part-horizontal">
                                    <label>Entrada:</label>
                                        <input name="entrada" type="time" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Informe a hora de entrada')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= isset($ac['entrada']) ? $ac['entrada']  : ''  ?>">
                                </div>
                                <!-- END ENTRADA -->
                                <!-- ÁREA DE ATUAÇÃO -->
                                <div class="col-3 form-part-horizontal">
                                    <label>Área de atuação</label>
                                        <select name="area_atuacao" class="form-control form-control-sm input-format-center">
                                                
                                                <option value=""></option>

                                                <option value="Conectividade"<?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Conectividade' ? "selected"  : ""  ?>>Conectividade</option>

                                                <option value="Servidores"<?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Servidores' ? "selected"  : ""  ?>>Servidores</option>

                                                <option value="Manutenção"<?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Manutenção' ? "selected"  : ""  ?>>Manutenção</option>

                                                <option value="Prevenção"<?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Prevenção' ? "selected"  : ""  ?>>Prevenção</option>

                                                <option value="Climatização"<?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Climatização' ? "selected"  : ""  ?>>Climatização</option>

                                                <option value="Limpeza"<?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Limpeza' ? "selected"  : ""  ?>>Limpeza</option>

                                                <option value="Outros"<?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Outros' ? "selected"  : ""  ?>>Outros</option>

                                        </select>
                                </div>
                                <!-- END ÁREA DE ATUAÇÃO -->
                                <!-- EQUIPAMENTO -->
                                <div class="form-part">
                                    <label>Equipamento:</label>
                                    <input type="text" name="equipamento" id="textarea-input" placeholder="Descrição do equipamento" class="form-control form-control-sm form-control-input" value="<?= isset($ac['equipamento']) ? $ac['equipamento'] : '' ?>">
                                </div>
                                <!-- END EQUIPAMENTO -->
                                <!-- SERVIÇO -->
                                <div class="form-part">
                                    <label>Serviço:</label>
                                    <textarea name="servico" id="textarea-input" placeholder="Descreva o serviço realizado" class="form-control form-control-sm form-control-textarea"><?= isset($ac['servico']) ? $ac['servico'] : '' ?></textarea>
                                </div>
                                <!-- END SERVIÇO -->
                                <!-- OBSERVAÇÃO -->
                                <div class="form-part">
                                    <label>Observação:</label>
                                    <textarea name="obs" id="textarea-input" placeholder="Observações relacionadas" class="form-control form-control-sm form-control-textarea"><?= isset($ac['obs']) ? $ac['obs'] : '' ?></textarea>
                                </div>
                                <!-- END OBSERVAÇÃO -->

                                <!-- Form part clear:both -->
                                
                                <!-- Form part clear:both -->

                                <p style="color:red"><strong>* Falta implementar operador 1 e 2 para campos do BD</strong></p>
                                <!-- SAÍDA -->
                                <div class="col-3 form-part-horizontal">
                                        <label>Saída:</label>
                                            <input name="saida" type="time" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Informe a hora de saída')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= isset($ac['saida']) ? $ac['saida']  : ''  ?>">
                                </div>
                                <!-- END SAÍDA -->
                                <!-- TURNO -->
                                <div class="col-xs-2 form-part-ext">
                                            <label>Turno:</label>
                                            <select name="turno" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Selecione o turno')" onchange="try{setCustomValidity('')}catch(e){}">

                                                    <option value=""></option>

                                                    <option value="1" <?= isset($ac['turno']) && $ac['turno'] == '1' ? "selected"  : ""  ?>>1</option>

                                                    <option value="2" <?= isset($ac['turno']) && $ac['turno'] == '2' ? "selected"  : ""  ?>>2</option>

                                                    <option value="3" <?= isset($ac['turno']) && $ac['turno'] == '3' ? "selected"  : ""  ?>>3</option>

                                            </select>
                                </div>
                                <!-- END TURNO -->

                                
                                <!-- OPERADOR 1-->
                                    <div class="col-md-3 form-part-ext">
                                            <label>Operador:</label>
                                            <select id="operador" name="operador" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Selecione o operador')" onchange="try{setCustomValidity('')}catch(e){}">
                                                    <option value=""></option>
                                                    
                                                    <?php foreach($userC->listaUsuarios() as $user): 
                                                         ?>

                                                    <option value="<?= $user['id'] ?>"

                                                      <?php
                                                      if(!isset($ac['operador'])){
                                                        echo $user['apelido'] == $_SESSION['logon'] ? 'selected' :  '';

                                                      }else{
                                                        //MEXER AQUI, TROCAR O $ac['operador'] POR UMA SAÍDA NOME REFERENTE AO ID DO OPERADOR 
                                                        $uc = $userC->retornaApelido($ac['operador']);
                                                        //echo $uc['apelido'];
                                                        echo $user['apelido'] == $uc['apelido'] ? 'selected' :  '';
                                                      }
                                                      ?>
                                                      ><?= $user['apelido']; ?>
                                                      
                                                    </option>

                                                    <?php  endforeach; ?>

                                            </select>
                                    </div>
                                <!-- END OPERADOR 1-->
                                <!-- OPERADOR 2-->
                                <div class="col-md-3 form-part-ext">
                                            <label>Operador:</label>
                                            <select id="operador" name="operador" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Selecione o operador')" onchange="try{setCustomValidity('')}catch(e){}">
                                                    <option value=""></option>
                                                    
                                                    <?php foreach($userC->listaUsuarios() as $user): 
                                                         ?>

                                                    <option value="<?= $user['id'] ?>"

                                                      <?php
                                                      if(!isset($ac['operador'])){
                                                        echo $user['apelido'] == $_SESSION['logon'] ? 'selected' :  '';

                                                      }else{
                                                        //MEXER AQUI, TROCAR O $ac['operador'] POR UMA SAÍDA NOME REFERENTE AO ID DO OPERADOR 
                                                        $uc = $userC->retornaApelido($ac['operador']);
                                                        //echo $uc['apelido'];
                                                        echo $user['apelido'] == $uc['apelido'] ? 'selected' :  '';
                                                      }
                                                      ?>
                                                      ><?= $user['apelido']; ?>
                                                      
                                                    </option>

                                                    <?php  endforeach; ?>

                                            </select>
                                    </div>
                                <!-- END OPERADOR 2-->

                                <?= !isset($ac) ? "<input type='hidden' name='acao' value='cadastrar'>" : "<input type='hidden' name='acao' value='editar'> <input type='hidden' name='id' value='$_GET[id]'>" ?>

                                <!-- Line and Buttons Submit -->
                                <div class="form-part" style="padding-top: 10px; clear:both; width: 90%">
                                    <hr>
                                </div>
                                <div class="form-part form-part-button-form" style="padding-bottom: 40px; clear:both; width: 100%;">
                                    <button type="submit" class="btn btn-success form-control-sm" id="sbmt" onclick="myFunction()"><?= !isset($ac) ? "Salvar" : "Editar" ?>
                                    </button>
                                   
                                </div>
                            </form>

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