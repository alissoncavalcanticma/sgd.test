<?php

require_once '../autoload.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $acessoC = new AcessoController();
  $ac = $acessoC->retornaAcesso($id);
  $userC = new UsuarioController();
}


?>
<!-- Resumo acesso -->
<!DOCTYPE html>
     <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width">
                <!-- Bootstrap CSS-->
                <link href="../assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
                <link href="../assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
                <link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
        </head>
        <body>
            <br>
            <div class="container">
                <div class="">
                    <a id="selecionar-tabela" href="#">Copiar >>>> <i class="fa fa-copy"></i></a>
                </div>
                <br>
                <table id="minha-tabela">
                    <thead>
                        <th>ID</th>
                        <th>DC</th>
                        <th>Operador</th>
                        <th>Solicitante</th>
                        <th>Empresa</th>
                        <th>Data</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                        
                    </thead>
                    <tbody>
                        <td><?= $ac['id'] ?></td>
                        <td><?= $ac['dc'] ?></td>
                        <td>
                            <?php
                                $uc = $userC->retornaApelido($ac['operador']);
                                echo $uc['apelido']; 
                            ?>
                        </td>
                        <td><?= $ac['solicitante'] ?></td>
                        <td><?= $ac['empresa'] ?></td>
                        <td>
                            <?php 
                                    $dt = array_reverse(explode('-', $ac['data']));
                                    $dt = implode('/', $dt);
                                    echo $dt; 

                            ?>
                            
                        </td>
                        <td><?= $ac['entrada'] ?></td>
                        <td><?= $ac['saida'] ?></td>
                        
                    </tbody>
                    <thead>
                        <th colspan="4">Motivo</th>
                        <th>Serviço</th>
                        <th>Equipamento</th>
                        <th colspan="2">Observação</th>
                       
                    </thead>
                    <tbody>
                        <td colspan="4"><?= $ac['motivo'] ?></td>
                        <td><?= $ac['servico'] ?></td>
                        <td><?= $ac['equipamento'] ?></td>
                        <td colspan="2"><?= $ac['obs'] ?></td>
                    </tbody>
                </table>
             
                <!--
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5"><strong>Resumo de acesso, id, dc, solicitante, empresa, motivo, serviço, equipamento, observação, data, agendamento, entrada, saida</strong></h5>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-10" style="margin: auto">
                        <div class="col-md-2 input-ra" style="float: left; width: 10%">
                            <label class="">ID</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $dc ?>">
                        </div>
                        <div class="col-md-2  input-ra" style="float: left; width: 25%">
                            <label>DC</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $dc ?>">
                        </div>
                        <div class="col-md-4  input-ra" style="float: left; width: 35%">
                            <label>Solicitante</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $dc ?>">
                        </div>
                        <div class="col-md-10  input-ra" style="float: right; width: 34%">
                            <label>Empresa</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $dc ?>">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-10 input-ra" style="width: 100%; margin: auto">
                            <label>Motivo</label>
                            <textarea class="form-control form-control-sm rounded-0">teste</textarea>   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-10 input-ra" style="width: 100%; margin: auto">
                            <label>Serviço</label>
                            <textarea class="form-control form-control-sm">teste</textarea>   
                        </div>
                    </div>
                </div>
                    

                <!--
                <div class="">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                </div>
                 <div class="col-md-3"  style="float: right; width: 50%">
                                <label>Data</label>
                                <input type="text" class="form-control" value="<?= date('d/m/Y', time()); ?>">
                    </div>
                 -->
               </div>
        </body>
</html>

        <!-- script copiar tabela -->
                <script type="text/javascript">
                        var Tabela = {
                          selecionarTabela: function(el) {
                            var body = document.body, range, sel;
                            if (document.createRange && window.getSelection) {
                                range = document.createRange();
                                sel = window.getSelection();
                                sel.removeAllRanges();
                                try {
                                    range.selectNodeContents(el);
                                    sel.addRange(range);
                                } catch (e) {
                                    range.selectNode(el);
                                    sel.addRange(range);
                                }
                            } else if (body.createTextRange) {
                                range = body.createTextRange();
                                range.moveToElementText(el);
                                range.select();
                            }
                            try {
                              document.execCommand('copy');
                              range.blur();
                            } catch(error){
                              // Exceção aqui
                            }
                          }
                        }

                        var selecionaTabelaBtn = document.querySelector("#selecionar-tabela");
                        var tabelaDeDados = document.querySelector("#minha-tabela");
                        // Seleciona a tabela no clique do botão
                        selecionaTabelaBtn.addEventListener("click", function(){
                          Tabela.selecionarTabela(tabelaDeDados);
                        });
                </script>


<!-- end resumo acesso -->
