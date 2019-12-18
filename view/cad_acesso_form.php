<!-- Form -->

<form action="../controller/AcessoController.class.php" method="get">
    <!-- row -->
    <div class="row row_form">
        <!-- DATA -->
        <div class="col-md-3">
            <label>Data:</label>
            <?php
            date_default_timezone_set('America/Sao_Paulo');
            $data = date("d/m/Y", time());
            ?>
            <input type="datetime" id="data" name="data" class="form-control form-control-sm input-format-center" 
            value="<?php
                        if (isset($ac['data'])) {
                            $dt = array_reverse(explode('-', $ac['data']));
                            $dt = implode('/', $dt);
                            echo $dt;
                        } else {
                            echo $data;
                        }
                        ?>" readonly>

            <!-- <input type="hidden" name="data" value="<?= $data ?>"> -->
        </div>
        <!-- END DATA -->
        <!-- MEIO DE CONTATO -->

        <div class="col-md-2">
            <label>Meio de contato:</label>
            <select name="meio_de_contato" class="form-control form-control-sm input-format-center" autofocus="autofocus">
                <option value=""></option>

                <option value="E-mail" <?= isset($ac['meio_de_contato']) && $ac['meio_de_contato'] == 'E-mail' ? "selected"  : ""  ?>>E-mail</option>

                <option value="Telefone" <?= isset($ac['meio_de_contato']) && $ac['meio_de_contato'] == 'Telefone' ? "selected"  : ""  ?>>Telefone</option>

                <option value="Presencial" <?= isset($ac['meio_de_contato']) && $ac['meio_de_contato'] == 'Presencial' ? "selected"  : ""  ?>>Presencial</option>

                <option value="Outros" <?= isset($ac['meio_de_contato']) && $ac['meio_de_contato'] == 'Outros' ? "selected"  : ""  ?>>Outros</option>

            </select>
        </div>

        <!-- END MEIO DE CONTATO -->
        <!-- SOLICITAÇÃO -->

        <div class="col-md-3">
            <label>Hora da solicitação:</label>
            <input name="solicitacao_acesso" type="time" class="form-control form-control-sm input-format-center" value="<?= isset($ac['solicitacao_acesso']) ? $ac['solicitacao_acesso']  : ''  ?>">
        </div>

        <!-- END SOLICITAÇÃO -->
        <!-- DC -->

        <div class="col-md-2">
            <label>DC:</label>
            <select name="dc" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Selecione o Datacenter')" onchange="try{setCustomValidity('')}catch(e){}">

                <option value=""></option>

                <option value="FCA" <?= isset($ac['dc']) && $ac['dc'] == 'FCA' ? "selected"  : ""  ?>>FCA</option>

                <option value="SP" <?= isset($ac['dc']) && $ac['dc'] == 'SP' ? "selected"  : ""  ?>>SP</option>

                <option value="DR" <?= isset($ac['dc']) && $ac['dc'] == 'DR' ? "selected"  : ""  ?>>DR</option>

                <option value="TR" <?= isset($ac['dc']) && $ac['dc'] == 'TR' ? "selected"  : ""  ?>>TR</option>

            </select>
        </div>
        <!-- END DC -->
    </div><!-- div /row -->


    <div class="row row_form">
        <!-- div row 2-->
        <!-- SOLICITANTE -->
        <div class="col-md-4">
            <label>Solicitante</label>
            <input name="solicitante" type="text" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('informe quem solicitou o acesso')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= isset($ac) ? $ac['solicitante'] : '' ?>">
        </div>
        <!-- END SOLICITANTE -->
        <!-- EMPRESA -->
        <div class="col-md-3">
            <label>Empresa</label>
            <input name="empresa" type="text" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Informe a empresa do solicitante')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= isset($ac) ? $ac['empresa'] : '' ?>">
        </div>
        <!-- END EMPRESA -->
        <!-- AGENDADO -->
        <div class="col-md-3">
            <label>Agendado para:</label>
            <input name="agendamento" type="time" class="form-control form-control-sm input-format-center" value="<?= isset($ac['agendamento']) ? $ac['agendamento']  : ''  ?>">
        </div>
        <!-- END AGENDADO -->
    </div><!-- div /row 2-->
    </div>

    <div class="row row_form">
        <!-- div row 3-->
        <!-- MOTIVO -->
        <div class="col-md-10">
            <label>Motivo:</label>
            <textarea name="motivo" id="textarea-input" placeholder="Descreva o motivo do acesso" class="form-control form-control-sm form-control-textarea" required oninvalid="setCustomValidity('Descreva o motivo do acesso')" onchange="try{setCustomValidity('')}catch(e){}"><?= isset($ac['motivo']) ? $ac['motivo'] : '' ?></textarea>
        </div>
        <!-- END MOTIVO -->
    </div><!-- div /row 3-->

    <div class="row row_form">
        <!-- div row 4-->
        <!-- CHEGADA -->
        <div class="col-md-3">
            <label>Chegada:</label>
            <input name="chegada" type="time" class="form-control form-control-sm input-format-center" value="<?= isset($ac['chegada']) ? $ac['chegada']  : ''  ?>">
        </div>
        <!-- END CHEGADA -->

        <!-- ENTRADA -->
        <div class="col-md-3">
            <label>Entrada:</label>
            <input name="entrada" type="time" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Informe a hora de entrada')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= isset($ac['entrada']) ? $ac['entrada']  : ''  ?>">
        </div>
        <!-- END ENTRADA -->
        <!-- ÁREA DE ATUAÇÃO -->
        <div class="col-md-4">
            <label>Área de atuação</label>
            <select name="area_atuacao" class="form-control form-control-sm input-format-center">

                <option value=""></option>

                <option value="Conectividade" <?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Conectividade' ? "selected"  : ""  ?>>Conectividade</option>

                <option value="Servidores" <?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Servidores' ? "selected"  : ""  ?>>Servidores</option>

                <option value="Manutenção" <?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Manutenção' ? "selected"  : ""  ?>>Manutenção</option>

                <option value="Prevenção" <?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Prevenção' ? "selected"  : ""  ?>>Prevenção</option>

                <option value="Climatização" <?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Climatização' ? "selected"  : ""  ?>>Climatização</option>

                <option value="Limpeza" <?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Limpeza' ? "selected"  : ""  ?>>Limpeza</option>

                <option value="Outros" <?= isset($ac['area_atuacao']) && $ac['area_atuacao'] == 'Outros' ? "selected"  : ""  ?>>Outros</option>

            </select>
        </div>
        <!-- END ÁREA DE ATUAÇÃO -->
    </div><!-- div row 4-->

    <div class="row row_form">
        <!-- div row 5-->
        <!-- EQUIPAMENTO -->
        <div class="col-md-10">
            <label>Equipamento:</label>
            <input type="text" name="equipamento" id="textarea-input" placeholder="Descrição do equipamento" class="form-control form-control-sm form-control-input" value="<?= isset($ac['equipamento']) ? $ac['equipamento'] : '' ?>">
        </div>
        <!-- END EQUIPAMENTO -->
    </div><!-- /div row 5-->

    <div class="row row_form">
        <!-- div row 6-->
        <!-- SERVIÇO -->
        <div class="col-md-10">
            <label>Serviço:</label>
            <textarea name="servico" id="textarea-input" placeholder="Descreva o serviço realizado" class="form-control form-control-sm form-control-textarea"><?= isset($ac['servico']) ? $ac['servico'] : '' ?></textarea>
        </div>
        <!-- END SERVIÇO -->
    </div><!-- /div row 6-->

    <div class="row row_form">
        <!-- div row 7-->
        <!-- OBSERVAÇÃO -->
        <div class="col-md-10">
            <label>Observação:</label>
            <textarea name="obs" id="textarea-input" placeholder="Observações relacionadas" class="form-control form-control-sm form-control-textarea"><?= isset($ac['obs']) ? $ac['obs'] : '' ?></textarea>
        </div>
        <!-- END OBSERVAÇÃO -->
    </div><!-- div row 7-->

    <!-- Form part clear:both -->

    <!-- Form part clear:both -->


    <div class="row row_form">
        <!-- div row 8-->
        <!-- SAÍDA -->
        <div class="col-md-3">
            <label>Saída:</label>
            <input name="saida" type="time" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Informe a hora de saída')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= isset($ac['saida']) ? $ac['saida']  : ''  ?>">
        </div>
        <!-- END SAÍDA -->

        <!-- TURNO -->
        <div class="col-md-1">
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
        <div class="col-md-3">
            <label>Operador:</label>
            <select id="operador" name="operador" class="form-control form-control-sm input-format-center" required oninvalid="setCustomValidity('Selecione o operador')" onchange="try{setCustomValidity('')}catch(e){}"  <?= $_GET['id'] ? 'disabled' : "" ?>  >
                <option value=""></option>

                <?php 
                    /*
                    if($_GET['id']){
                        $pesquisaStatus = "";
                    }else{
                        $pesquisaStatus = "WHERE status = 'ativo'";
                    }
                    */
                    foreach ($userC->listaUsuarios("") as $user) :
                    
                    ?>

                    <option value="<?= $user['id'] ?>" <?php

                                                            //Lógica de add
                                                            if (!isset($ac['operador'])) {
                                                                echo $user['apelido'] == $_SESSION['logon'] ? 'selected' : '';
                                                            }
                                                            //Lógica de Editar
                                                            else{
                                                                
                                                                $uc = $userC->retornaApelido($ac['operador']);
                                                                //echo $uc['apelido'];
                                                                echo $user['apelido'] == $uc['apelido'] ? 'selected' : '';
                                                            }
                                                            ?>><?= $user['apelido']; ?>

                    </option>

                <?php endforeach; ?>

            </select>
        </div>
        <!-- END OPERADOR 1-->
        <!-- OPERADOR 2-->
        <div class="col-md-3">
            <label>Operador 2:</label>
            <select id="operador_2" name="operador_2" class="form-control form-control-sm input-format-center" <?= $_GET['id'] ? 'disabled' : "" ?> >
                <option value="0"></option>

                <?php 
                    
                    if($_GET['id']){
                        $pesquisaStatus = "";
                    }else{
                        $pesquisaStatus = "WHERE status = 'ativo'";
                    }

                    foreach ($userC->listaUsuarios($pesquisaStatus) as $user) :
                    
                    ?>

                    <option value="<?= $user['id'] ?>" <?php

                                                            //lógica de add novo registro
                                                            if (!isset($ac['operador_2'])) {
                                                                
                                                                echo $user['apelido'];
                                                            
                                                            //lógica de editar registro existente
                                                            } else {
                                                                if($ac['operador_2'] > 0){
                                                                    $uc = $userC->retornaApelido($ac['operador_2']);
                                                                    echo $user['apelido'] == $uc['apelido'] ? 'selected' : '';    
                                                                }else{
                                                                    echo "";
                                                                }
                                                                //$uc = $userC->retornaApelido($ac['operador_2']);
                                                                //echo $user['apelido'] == $uc['apelido'] ? 'selected' : '';
                                                            }

                                                        ?>>
                        <?= $user['apelido']; ?>

                    </option>

                <?php endforeach; ?>

            </select>
        </div>
        <!-- END OPERADOR 2-->

    </div><!-- /div row 8-->



    <?= !isset($ac) ? "<input type='hidden' name='acao' value='cadastrar'>" : "<input type='hidden' name='acao' value='editar'> <input type='hidden' name='id' value='$_GET[id]'>" ?>

    <!-- Line and Buttons Submit -->

    <div class="row row_form">

        <div class="col-md-11">

            <div class="form-part" style="padding-top: 40px; clear:both; width: 90%">
                <hr>
            </div>
            <div class="" style="padding-bottom: 40px; clear:both; width: 100%;">
                <button type="submit" class="btn btn-success form-control-sm" id="sbmt" onclick="myFunction()"><?= !isset($ac) ? "Salvar" : "Editar" ?>
                </button>
            </div>
        </div>
    </div>
</form>
<!-- END FORM -->