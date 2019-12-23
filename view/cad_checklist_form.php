<!-- Form -->
                                   <form action="../controller/ChecklistController.class.php" method="get">

                                                        <div class="row" style="margin-bottom: 7px">
                                                            
                                                            <div class="col-md-12" style="background-color: #E9ECEF">
                                                            
                                                            <!-- TURNO -->
                                                                <div class="col-md-4" style="float: left">
                                                                    <select style="background-color: #E9ECEF; font-weight: bold; font-size: 14px; border: 0px" name="turno" class="form-control text-center"  required oninvalid="setCustomValidity('Selecione o turno')" onchange="try{setCustomValidity('')}catch(e){}">

                                                                            <option value="">Selecione o turno...</option>

                                                                            <option value="1" <?= isset($id) && $chk['turno'] == '1' ? "selected"  : ""  ?>>Turno 1</option>

                                                                            <option value="2" <?= isset($id) && $chk['turno'] == '2' ? "selected"  : ""  ?>>Turno 2</option>

                                                                            <option value="3" <?= isset($id) && $chk['turno'] == '3' ? "selected"  : ""  ?>>Turno 3</option>
                                                                    </select>
                                                                </div>
                                                                <!-- END TURNO -->
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

                                                        <!-- TITLE DC'S -->
                                                        <div class="row" style="text-align: center; background-color: #E9ECEF">

                                                            <div class="col-md-4 table-bordered">

                                                            </div>
                                                            <div class="col-md-2 table-bordered text-center">
                                                                DC FCA
                                                            </div>
                                                            <div class="col-md-2 table-bordered text-center">
                                                                DC Supplier Park
                                                            </div>
                                                            <div class="col-md-2 table-bordered text-center">
                                                                DC DR
                                                            </div>
                                                            <div class="col-md-2 table-bordered text-center">
                                                                Sala Técnica
                                                            </div>
                                                        </div>
                                                        <!-- END TITLE DC'S -->

                                                        <!-- OPERADOR -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                <label>Operador:</label>
                                                            </div>
                                                            <!-- OPERADOR FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="">

                                                                    <select id="operador_fca" name="operador_fca" class="form-control input-format-center" required oninvalid="setCustomValidity('Selecione um operador')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                        <option value=""></option>
                                                                        
                                                                        
                                                                        <?php 
                                                                            
                                                                            if(isset($_GET['id'])){
                                                                                $pesquisaStatus = "";
                                                                            }else{
                                                                                $pesquisaStatus = "WHERE status = 'ativo'";
                                                                            }
                                                                            
                                                                            foreach ($userC->listaUsuarios($pesquisaStatus) as $user) :
                                                                            
                                                                            ?>

                                                                            <option value="<?= $user['id'] ?>" <?php

                                                                                                                    //Lógica de add
                                                                                                                    if (!isset($_GET['id'])) {
                                                                                                                        echo $user['apelido'] == $_SESSION['logon'] ? 'selected' : '';
                                                                                                                    }
                                                                                                                    //Lógica de Editar
                                                                                                                    else {
                                                                                                                        
                                                                                                                        $uc = $userC->retornaApelido($chk['operador_fca']);
                                                                                                                        //echo $uc['apelido'];
                                                                                                                        echo $user['apelido'] == $uc['apelido'] ? 'selected' : '';
                                                                                                                    }
                                                                                                                    ?>><?= $user['apelido']; ?>

                                                                            </option>

                                                                        <?php endforeach; ?>

                                                                    </select>
                                                                    <?php //echo "user: ".$user['apelido']."<br> UC: ".$uc['apelido']; ?>
                                                                </div>

                                                            </div>
                                                            <!-- END OPERADOR FCA -->

                                                            <!-- OPERADOR SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="">

                                                                    <select id="operador_sp" name="operador_sp" class="form-control input-format-center" required oninvalid="setCustomValidity('Selecione um operador')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                        <option value=""></option>
                                                        
                                                                        <?php 
                                                                            
                                                                            foreach ($userC->listaUsuarios($pesquisaStatus) as $user) :
                                                                            
                                                                                ?>
    
                                                                                <option value="<?= $user['id'] ?>" <?php
    
                                                                                                                        //Lógica de add
                                                                                                                        if (!isset($_GET['id'])) {
                                                                                                                            echo $user['apelido'] == $_SESSION['logon'] ? 'selected' : '';
                                                                                                                        }
                                                                                                                        //Lógica de Editar
                                                                                                                        else {
                                                                                                                            
                                                                                                                            $uc = $userC->retornaApelido($chk['operador_sp']);
                                                                                                                            //echo $uc['apelido'];
                                                                                                                            echo $user['apelido'] == $uc['apelido'] ? 'selected' : '';
                                                                                                                        }
                                                                                                                        ?>><?= $user['apelido']; ?>
    
                                                                                </option>
    
                                                                            <?php endforeach; ?>


                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- END OPERADOR SP -->

                                                            <!-- OPERADOR DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="">

                                                                    <select id="operador_dr" name="operador_dr" class="form-control input-format-center" required oninvalid="setCustomValidity('Selecione um operador')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                        <option value=""></option>
                                                        
                                                                        <?php 
                                                                            
                                                                            foreach ($userC->listaUsuarios($pesquisaStatus) as $user) :
                                                                            
                                                                                ?>
    
                                                                                <option value="<?= $user['id'] ?>" <?php
    
                                                                                                                        //Lógica de add
                                                                                                                        if (!isset($_GET['id'])) {
                                                                                                                            echo $user['apelido'] == $_SESSION['logon'] ? 'selected' : '';
                                                                                                                        }
                                                                                                                        //Lógica de Editar
                                                                                                                        else {
                                                                                                                            
                                                                                                                            $uc = $userC->retornaApelido($chk['operador_dr']);
                                                                                                                            //echo $uc['apelido'];
                                                                                                                            echo $user['apelido'] == $uc['apelido'] ? 'selected' : '';
                                                                                                                        }
                                                                                                                        ?>><?= $user['apelido']; ?>
    
                                                                                </option>
    
                                                                            <?php endforeach; ?>


                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- END OPERADOR DR -->

                                                            <!-- OPERADOR TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="">

                                                                    <select id="operador_tr" name="operador_tr" class="form-control input-format-center" required oninvalid="setCustomValidity('Selecione um operador')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                        <option value=""></option>
                                                        
                                                                        <?php 
                                                                            
                                                                            foreach ($userC->listaUsuarios($pesquisaStatus) as $user) :
                                                                            
                                                                                ?>
    
                                                                                <option value="<?= $user['id'] ?>" <?php
    
                                                                                                                        //Lógica de add
                                                                                                                        if (!isset($_GET['id'])) {
                                                                                                                            echo $user['apelido'] == $_SESSION['logon'] ? 'selected' : '';
                                                                                                                        }
                                                                                                                        //Lógica de Editar
                                                                                                                        else {
                                                                                                                            
                                                                                                                            $uc = $userC->retornaApelido($chk['operador_tr']);
                                                                                                                            //echo $uc['apelido'];
                                                                                                                            echo $user['apelido'] == $uc['apelido'] ? 'selected' : '';
                                                                                                                        }
                                                                                                                        ?>><?= $user['apelido']; ?>
    
                                                                                </option>
    
                                                                            <?php endforeach; ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- END OPERADOR TR -->
                                                        </div>
                                                        <!-- END OPERADOR -->
                                                       
                                                       <!-- HORA -->
                                                        <div class="row" style="padding-bottom:5px">
                                                            <div class="col-md-4 table-bordered">
                                                                Hora:
                                                            </div>
                                                            <!-- HORA FCA -->
                                                            <div class="col-md-2 table-bordered" style="padding-left: 2px; padding-right: 2px;">
                                                                <div style="width: 50%; float: left; text-align: center">
                                                                    <label style="font-size: 13px">Entrada:</label>
                                                                    <input name="entrada_fca" type="time" class="form-control time-adjust input-format-center" value="<?= isset($id) ? $chk['entrada_fca'] : '' ?>" required oninvalid="setCustomValidity('Insira a hora de entrada')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <div style="width: 50%; float: right; text-align: center">
                                                                    <label style="font-size: 13px">Saída:</label>
                                                                    <input name="saida_fca" type="time" class="form-control time-adjust input-format-center" value="<?= isset($id) ? $chk['saida_fca'] : '' ?>" required oninvalid="setCustomValidity('Insira a hora de saída')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                            </div>
                                                            <!-- END HORA FCA -->
                                                            <!-- HORA SP -->
                                                            <div class="col-md-2 table-bordered" style="padding-left: 2px; padding-right: 2px;">
                                                                <div style="width: 50%; float: left; text-align: center">
                                                                    <label style="font-size: 13px">Entrada:</label>
                                                                    <input name="entrada_sp" type="time" class="form-control time-adjust input-format-center" value="<?= isset($id) ? $chk['entrada_sp'] : '' ?>" required oninvalid="setCustomValidity('Insira a hora de entrada')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <div style="width: 50%; float: right; text-align: center">
                                                                    <label style="font-size: 13px">Saída:</label>
                                                                    <input name="saida_sp" type="time" class="form-control time-adjust input-format-center" value="<?= isset($id) ? $chk['saida_sp'] : '' ?>" required oninvalid="setCustomValidity('Insira a hora de saída')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                            </div>
                                                            <!-- END HORA SP -->
                                                            <!-- HORA DR -->
                                                            <div class="col-md-2 table-bordered" style="padding-left: 2px; padding-right: 2px;">
                                                                <div style="width: 50%; float: left; text-align: center">
                                                                    <label style="font-size: 13px">Entrada:</label>
                                                                    <input name="entrada_dr" type="time" class="form-control time-adjust input-format-center" value="<?= isset($id) ? $chk['entrada_dr'] : '' ?>" required oninvalid="setCustomValidity('Insira a hora de entrada')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <div style="width: 50%; float: right; text-align: center">
                                                                    <label style="font-size: 13px">Saída:</label>
                                                                    <input name="saida_dr" type="time" class="form-control time-adjust input-format-center" value="<?= isset($id) ? $chk['saida_dr'] : '' ?>" required oninvalid="setCustomValidity('Insira a hora de saída')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                            </div>
                                                            <!-- END HORA DR -->
                                                            <!-- HORA TR -->
                                                            <div class="col-md-2 table-bordered" style="padding-left: 2px; padding-right: 2px;">
                                                                <div style="width: 50%; float: left; text-align: center">
                                                                    <label style="font-size: 13px">Entrada:</label>
                                                                    <input name="entrada_tr" type="time" class="form-control time-adjust input-format-center" value="<?= isset($id) ? $chk['entrada_tr'] : '' ?>" required oninvalid="setCustomValidity('Insira a hora de entrada')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <div style="width: 50%; float: right; text-align: center">
                                                                    <label style="font-size: 13px">Saída:</label>
                                                                    <input name="saida_tr" type="time" class="form-control time-adjust input-format-center" value="<?= isset($id) ? $chk['saida_tr'] : '' ?>" required oninvalid="setCustomValidity('Insira a hora de saída')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                            </div>
                                                            <!-- END HORA TR -->
                                                        </div>
                                                        <!-- END HORA -->
                                                        
                                                        <!-- CHECK'S SERVER ROOM -->
                                                         <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF ">SERVER ROOM</p>
                                                        </div>

                                                        <!-- RACK'S -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Rack's:
                                                            </div>
                                                            <!-- RACK'S FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input style="line-height: 0.5; text-align: center;" type="checkbox" name="racks_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['racks_fca'] == 1 ? "checked" : ""; ?> style="padding-top: 0px">
                                                                </div>
                                                            </div>
                                                            <!-- END RACK'S FCA -->
                                                            <!-- RACK'S SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="racks_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['racks_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END RACK'S SP -->
                                                            <!-- RACK'S DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="racks_dr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['racks_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END RACK'S DR -->
                                                            <!-- RACK'S TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="racks_tr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['racks_tr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END RACK'S TR -->
                                                        </div>
                                                        <!-- END RACK'S -->

                                                        <!-- ORGAN. SALA -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Organização da Sala:
                                                            </div>
                                                            <!-- ORGAN. SALA FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="org_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['org_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END ORGAN. SALA FCA -->
                                                            <!-- ORGAN. SALA SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="org_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['org_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END ORGAN. SALA SP -->
                                                            <!-- ORGAN. SALA DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="org_dr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['org_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END ORGAN. SALA DR -->
                                                            <!-- ORGAN. SALA TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="org_tr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['org_tr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END ORGAN. SALA TR -->
                                                        </div>
                                                        <!-- END ORGAN. SALA -->
                                                        <!-- LUMINARIAS -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Luminárias:
                                                            </div>
                                                            <!-- LUMINARIAS FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="lumin_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['lumin_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END LUMINARIAS FCA -->
                                                            <!-- LUMINARIAS SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="lumin_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['lumin_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END LUMINARIAS SP -->
                                                            <!-- LUMINARIAS DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="lumin_dr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['lumin_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END LUMINARIAS DR -->
                                                            <!-- LUMINARIAS TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="lumin_tr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['lumin_tr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END LUMINARIAS TR -->
                                                        </div>
                                                        <!-- END LUMINARIAS -->
                                                        
                                                        <!-- INFRA -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Infra-estrutura da sala:
                                                            </div>
                                                            <!-- INFRA FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="infra_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['infra_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END INFRA FCA -->
                                                            <!-- INFRA SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="infra_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['infra_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END INFRA SP -->
                                                            <!-- INFRA DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="infra_dr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['infra_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END INFRA DR -->
                                                            <!-- INFRA TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="infra_tr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['infra_tr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END INFRA TR -->
                                                        </div>
                                                        <!-- END INFRA -->

                                                        <!-- CONDIÇÃO DE ACESSO -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Condição de acesso:
                                                            </div>
                                                            <!-- CONDIÇÃO DE ACESSO FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="acesso_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['acesso_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END CONDIÇÃO DE ACESSO FCA -->
                                                            <!-- CONDIÇÃO DE ACESSO SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="acesso_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['acesso_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END CONDIÇÃO DE ACESSO DR -->
                                                            <!-- CONDIÇÃO DE ACESSO SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="acesso_dr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['acesso_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END CONDIÇÃO DE ACESSO DR -->
                                                            <!-- CONDIÇÃO DE ACESSO TR-->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="acesso_tr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['acesso_tr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END CONDIÇÃO DE ACESSO TR-->
                                                        </div>
                                                        <!-- END CONDIÇÃO DE ACESSO -->
                                                        <!-- PT CORTA FOGO -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Porta corta fogo:
                                                            </div>
                                                            <!-- PT CORTA FOGO FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="portacf_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['portacf_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END PT CORTA FOGO FCA-->
                                                            <!-- PT CORTA FOGO SP-->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="portacf_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['portacf_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END PT CORTA FOGO SP-->
                                                            <!-- PT CORTA FOGO DR-->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="portacf_dr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['portacf_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END PT CORTA FOGO DR-->
                                                            <div class="col-md-2 table-bordered">
                                                                <!-- -->
                                                            </div>
                                                        </div>
                                                        <!-- END PT CORTA FOGO -->
                                                        <!-- AR-CONDICIONADOS -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Ar-condicionados:
                                                            </div>
                                                            <!-- AR-CONDICIONADOS FCA-->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="arc_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['arc_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END AR-CONDICIONADOS FCA -->
                                                            <!-- AR-CONDICIONADOS SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="arc_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['arc_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END AR-CONDICIONADOS SP -->
                                                            <!-- AR-CONDICIONADOS DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="arc_dr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['arc_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END AR-CONDICIONADOS DR -->
                                                            <!-- AR-CONDICIONADOS TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="arc_tr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['arc_tr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END AR-CONDICIONADOS TR -->
                                                        </div>
                                                        <!-- END AR-CONDICIONADOS -->
                                                        
                                                        <!-- SISTEMA/EXTINTORES INCÊNDIO -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Sistema / Extintores de incêndio:
                                                            </div>
                                                            <!-- SISTEMA / EXTINTORES DE INCÊNDIO FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="sist_extint_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['sist_extint_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END SISTEMA / EXTINTORES DE INCÊNDIO FCA -->
                                                            <!-- SISTEMA / EXTINTORES DE INCÊNDIO SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="sist_extint_sp" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['sist_extint_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END SISTEMA / EXTINTORES DE INCÊNDIO SP -->
                                                            <!-- SISTEMA / EXTINTORES DE INCÊNDIO DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="sist_extint_dr" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['sist_extint_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END SISTEMA / EXTINTORES DE INCÊNDIO DR -->
                                                            <!-- SISTEMA / EXTINTORES DE INCÊNDIO TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="sist_extint_tr" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['sist_extint_tr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END SISTEMA / EXTINTORES DE INCÊNDIO TR -->
                                                        </div>
                                                        <!-- END SISTEMA/EXTINTORES INCÊNDIO -->

                                                        <!-- LED SAUDE -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Led de Saúde:
                                                            </div>
                                                            <!-- LED SAUDE FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="ledsaude_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['ledsaude_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END LED SAUDE FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                
                                                            </div>
                                                            <!-- LED SAUDE DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="ledsaude_dr" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['ledsaude_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END LED SAUDE DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- END LED SAUDE -->
                                                    
                                                    <!-- CHECK'S -->

                                                        <!-- TEMPERATURAS -->

                                                        <!-- TEMPERATURA 1  -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                TEMP. 1 / HUMID. 1:
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!-- TEMPERATURA FCA 01  -->
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="temp01_fca" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['temp01_fca'] : '' ?>" required oninvalid="setCustomValidity('Insira a temperatura 01 FCA')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END TEMPERATURA FCA 01  -->
                                                                <!-- HUMIDADE FCA 01  -->
                                                                <div style="width: 50%; float: right">

                                                                    <input name="humid01_fca" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['humid01_fca'] : '' ?>"  required oninvalid="setCustomValidity('Insira a humidade 01 FCA')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END HUMIDADE FCA 01 -->
                                                            </div>

                                                            <div class="col-md-2 table-bordered">
                                                                <!-- TEMPERATURA SP 01  -->
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="temp01_sp" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['temp01_sp'] : '' ?>" required oninvalid="setCustomValidity('Insira a temperatura 01 SP')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END TEMPERATURA SP 01  -->
                                                                <!-- HUMIDADE SP 01  -->
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="humid01_sp" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['humid01_sp'] : '' ?>" required oninvalid="setCustomValidity('Insira a humidade 01 SP')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END HUMIDADE SP 01  -->
                                                            </div>
                                                            <!--  -->
                                                            <div class="col-md-2 table-bordered">
                                                                <!-- TEMPERATURA DR 01 -->
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="temp_dr" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['temp_dr'] : '' ?>" required oninvalid="setCustomValidity('Insira a temperatura DR')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END TEMPERATURA DR 01 -->
                                                                <!-- HUMIDADE DR 01 -->
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="humid_dr" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['humid_dr'] : '' ?>" required oninvalid="setCustomValidity('Insira a humidade DR')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END HUMIDADE DR 01 -->
                                                            </div>
                                                            <!--  -->
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="entrada" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="saida" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                -->
                                                            </div>

                                                        </div>

                                                        <!-- END TEMPERATURA 1  -->


                                                        <!-- TEMPERATURA 2  -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                TEMP. 2 / HUMID. 2:
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!-- TEMPERATURA FCA 02  -->
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="temp02_fca" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['temp02_fca'] : '' ?>" required oninvalid="setCustomValidity('Insira a temperatura 02 FCA')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END TEMPERATURA FCA 02  -->
                                                                <!-- HUMIDADE FCA 02  -->
                                                                <div style="width: 50%; float: right">

                                                                    <input name="humid02_fca" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['humid02_fca'] : '' ?>" required oninvalid="setCustomValidity('Insira a humidade 02 FCA')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END HUMIDADE FCA 02 -->
                                                            </div>

                                                            <div class="col-md-2 table-bordered">
                                                                <!-- TEMPERATURA SP 02 -->
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="temp02_sp" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['temp02_sp'] : '' ?>" required oninvalid="setCustomValidity('Insira a temperatura 02 SP')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END TEMPERATURA SP 02  -->
                                                                <!-- HUMIDADE SP 02 -->
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="humid02_sp" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['humid02_sp'] : '' ?>" required oninvalid="setCustomValidity('Insira a humidade 02 SP')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END HUMIDADE SP 02  -->
                                                            </div>
                                                            <!--  -->
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="entrada" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="saida" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                -->
                                                            </div>
                                                            <!--  -->
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="entrada" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="saida" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                -->
                                                            </div>

                                                        </div>

                                                        <!-- END TEMPERATURA 2  -->

                                                        <!-- TEMPERATURA 3  -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                TEMP. 3 / HUMID. 3:
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!-- TEMPERATURA FCA 03  -->
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="temp03_fca" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['temp03_fca'] : '' ?>" required oninvalid="setCustomValidity('Insira a temperatura 03 FCA')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END TEMPERATURA FCA 03  -->
                                                                <!-- HUMIDADE FCA 03 -->
                                                                <div style="width: 50%; float: right">

                                                                    <input name="humid03_fca" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['humid03_fca'] : '' ?>" required oninvalid="setCustomValidity('Insira a humidade 03 FCA')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END HUMIDADE FCA 03 -->
                                                            </div>

                                                            <div class="col-md-2 table-bordered">
                                                                <!-- TEMPERATURA SP 03 -->
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="temp03_sp" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['temp03_sp'] : '' ?>" required oninvalid="setCustomValidity('Insira a temperatura 03 SP')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END TEMPERATURA SP 03  -->
                                                                <!-- HUMIDADE SP 03 -->
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="humid03_sp" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['humid03_sp'] : '' ?>" required oninvalid="setCustomValidity('Insira a humidade 03 SP')" onchange="try{setCustomValidity('')}catch(e){}">
                                                                </div>
                                                                <!-- END HUMIDADE SP 03 -->
                                                            </div>
                                                            <!--  -->
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="entrada" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="saida" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div style="width: 50%; float: left">
                                                                    
                                                                    <input name="entrada" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                <div style="width: 50%; float: right">
                                                                    
                                                                    <input name="saida" type="number" class="form-control input-format-center" value="">
                                                                </div>
                                                                -->
                                                            </div>

                                                        </div>

                                                        <!-- END TEMPERATURA 3  -->

                                                        <!-- END TEMPERATURAS -->

                                                        <!-- CAPACIDADE DA UPS  -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Capacidade da UPS:
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!-- 
                                                                -->
                                                            </div>

                                                            <div class="col-md-2 table-bordered">
                                                                <!-- 
                                                                -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!-- 
                                                                -->
                                                            </div>
                                                            <!-- CAPACIDADE UPS TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <div style="width: 80%; margin:auto">
                                                                    
                                                                        <input name="cap_ups_tr" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['cap_ups_tr'] : '' ?>" required oninvalid="setCustomValidity('Insira a capacidade da UPS da TR')" onchange="try{setCustomValidity('')}catch(e){}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END CAPACIDADE UPS TR -->

                                                        </div>

                                                        <!-- END CAPACIDADE DA UPS  -->
                                                        <!-- SALA DE CIRCULAÇÃO -->

                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF ">SALA DE CIRCULAÇÃO</p>
                                                        </div>
                                                        <!-- LUMINÁRIAS SC -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Luminárias:
                                                            </div>
                                                            <!-- LUMINÁRIAS SALA CIRCULAÇÃO FCA  -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="lumin_sc_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['lumin_sc_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END LUMINÁRIAS SALA CIRCULAÇÃO FCA  -->

                                                            <div class="col-md-2 table-bordered">
                                                                <!--<div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                 -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--<div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                 -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>
                                                        <!-- END LUMINÁRIAS SC -->
                                                        <!-- PORTA CORTA FOGO SC -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Porta corta fogo:
                                                            </div>
                                                            <!-- PORTA CORTA FOGO SALA CIRCULAÇÃO FCA  -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="portacf_sc_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['portacf_sc_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END PORTA CORTA FOGO SALA CIRCULAÇÃO FCA  -->

                                                            <div class="col-md-2 table-bordered">
                                                                <!--<div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                 -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--<div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                 -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>
                                                        <!-- END PORTA CORTA FOGO SC -->

                                                        <!-- CONDIÇÃO DE ACESSO SALA CIRC. FCA -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Condição de acesso:
                                                            </div>
                                                            <!-- CONDIÇÃO DE ACESSO SALA CIRC. FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="acesso_sc_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['acesso_sc_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END CONDIÇÃO DE ACESSO SALA CIRC. FCA -->

                                                            <div class="col-md-2 table-bordered">
                                                                <!--<div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                 -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--<div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                 -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>
                                                        <!-- END CONDIÇÃO DE ACESSO SALA CIRC. FCA  -->

                                                        <!-- END SALA DE CIRCULAÇÃO -->

                                                        <!-- AREA EXTERNA -->
                                                        
                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF ">ÁREA EXTERNA</p>
                                                        </div>

                                                        <!-- GERADORES -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Geradores:
                                                            </div>
                                                            <!-- GERADORES FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="geradores_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['geradores_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END GERADORES FCA -->
                                                            <!-- GERADORES SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="geradores_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['geradores_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END GERADORES FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>
                                                        <!-- END GERADORES -->

                                                        <!-- ORG EXTERNA -->
                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                Organização externa:
                                                            </div>
                                                            <!-- ORG EXTERNA FCA -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="org_ext_fca" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['org_ext_fca'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END ORG EXTERNA FCA -->
                                                            <!-- ORG EXTERNA SP -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="org_ext_sp" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['org_ext_sp'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END ORG EXTERNA SP -->
                                                            <!-- ORG EXTERNA DR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="org_ext_dr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['org_ext_dr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END ORG EXTERNA DR -->
                                                            <!-- ORG EXTERNA TR -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="org_ext_tr" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['org_ext_tr'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- END ORG EXTERNA TR -->
                                                        </div>
                                                        <!-- END ORG EXTERNA -->

                                                        <!-- END AREA EXTERNA -->
                                                        
                                                        <!-- MONITORAMENTO -->

                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF ">FERRAMENTAS DE MONITORAMENTO</p>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 table-bordered">
                                                                ZABBIX:
                                                            </div>
                                                            <!-- ZABBIX -->
                                                            <div class="col-md-2 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="zabbix" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['zabbix'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                            <!-- ZABBIX -->
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                -->
                                                            </div>
                                                            <div class="col-md-2 table-bordered">
                                                                <!--
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" data-toggle="toggle" data-width="100" data-height="2" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger">
                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>

                                                        <!-- END MONITORAMENTO -->
                                                        <hr>
                                                        <!-- OBS CHECKLIST -->
                                                        <!-- OBS CHECKLIST FCA -->
                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF; color: #666666">OBS CHECKLIST DC FCA</p>
                                                        </div>

                                                        <div class="row table-bordered">

                                                                <textarea name="obs_fca" id="textarea-input" placeholder="Detalhamento das observações de checklist do DC FCA" class="form-control form-control-textarea" style="width: 100%" ><?= $chk['obs_fca']; ?></textarea>
                                                        </div>
                                                        <!-- END OBS CHECKLIST FCA -->
                                                        <!-- OBS CHECKLIST SP -->
                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF; color: #666666">OBS CHECKLIST DC SUPPLIER PARK</p>
                                                        </div>

                                                        <div class="row table-bordered">

                                                                <textarea name="obs_sp" id="textarea-input" placeholder="Detalhamento das observações de checklist do DC SP" class="form-control form-control-textarea" style="width: 100%"><?= $chk['obs_sp']; ?></textarea>
                                                        </div>
                                                        <!-- END OBS CHECKLIST SP -->
                                                        <!-- OBS CHECKLIST DR -->
                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF; color: #666666">OBS CHECKLIST DC DR</p>
                                                        </div>

                                                        <div class="row table-bordered">

                                                                <textarea name="obs_dr" id="textarea-input" placeholder="Detalhamento das observações de checklist do DC DR" class="form-control form-control-textarea" style="width: 100%"><?= $chk['obs_dr']; ?></textarea>
                                                        </div>
                                                        <!-- END OBS CHECKLIST DR -->
                                                        <!-- OBS CHECKLIST TR -->
                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF; color: #666666">OBS CHECKLIST SALA TÉCNICA</p>
                                                        </div>

                                                        <div class="row table-bordered">

                                                                <textarea name="obs_tr" id="textarea-input" placeholder="Detalhamento das observações de checklist da Sala Técnica" class="form-control form-control-textarea" style="width: 100%;"><?= $chk['obs_tr']; ?></textarea>
                                                        </div>
                                                        <!-- END OBS CHECKLIST TR -->
                                                        <!-- END OBS CHECKLIST -->
                                                        <hr>

                                                        <!-- CHECKLIST NPO -->

                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF ">CHECKLIST NPO</p>
                                                        </div>
                                                        
                                                        <!-- CHECKLIST CARRO NPO -->
                                                        <div class="row">
                                                            <div class="col-md-6 table-bordered">
                                                                <div style="padding-left: 20px; line-height: 50px">Carro:
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="chk_carro" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['chk_carro'] == 1 ? "checked" : ""; ?> >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END CHECKLIST CARRO NPO -->
                                                        <!-- CHECKLIST SALA NPO -->
                                                        <div class="row">
                                                            <div class="col-md-6 table-bordered">
                                                                <div style="padding-left: 20px; line-height: 50px">Sala:
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="chk_sala" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['chk_sala'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END CHECKLIST SALA NPO -->
                                                        <!-- CHECKLIST NOTBOOK NPO -->
                                                        <div class="row">
                                                            <div class="col-md-6 table-bordered">
                                                                <div style="padding-left: 20px; line-height: 50px">
                                                                    Notebook:
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="chk_not" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['chk_not'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END CHECKLIST NOTBOOK NPO -->
                                                        <!-- CHECKLIST CELULAR NPO -->
                                                        <div class="row">
                                                            <div class="col-md-6 table-bordered">
                                                                <div style="padding-left: 20px; line-height: 50px">
                                                                    Celular:
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 table-bordered">
                                                                <div class="input-format-center">
                                                                    <input type="checkbox" name="chk_cel" data-toggle="toggle" data-width="100" data-height="10" data-on="OK" data-off="X" data-onstyle="success" data-offstyle="danger" value="1" <?= $chk['chk_cel'] == 1 ? "checked" : ""; ?>>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END CHECKLIST CELULAR NPO -->
                                                        <!-- CHECKLIST BATERIA CELULAR NPO -->
                                                        <div class="row">
                                                            <div class="col-md-6 table-bordered">
                                                                <div style="padding-left: 20px; line-height: 50px">
                                                                    Bateria Celular:
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 table-bordered">
                                                                <div class="input-format-center">
                                                                    <div style="width: 25%; margin:auto; padding: 5px">
                                                                    
                                                                    <input name="chk_batcel" type="number" class="form-control input-format-center" value="<?= isset($id) ? $chk['chk_batcel'] : "" ?>" required oninvalid="setCustomValidity('Insira a % da bateria do celular')" onchange="try{setCustomValidity('')}catch(e){}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END CHECKLIST CELULAR NPO -->
                                                        <!-- OBS CHECKLIST NPO -->
                                                        <div class="row table-bordered">
                                                            <p style="text-align: center; width: 100%; background-color: #E9ECEF; color: #666666">OBS CHECKLIST NPO</p>
                                                        </div>
                                                        <div class="row table-bordered">

                                                                <textarea name="obs_npo" id="textarea-input" placeholder="Detalhamento das observações NPO" class="form-control form-control-textarea" style="width: 100%"><?= $chk['obs_npo']; ?></textarea>
                                                        </div>
                                                        <!-- END OBS CHECKLIST NPO -->
                                                        
                                                        <!-- END CHECKLIST NPO -->

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