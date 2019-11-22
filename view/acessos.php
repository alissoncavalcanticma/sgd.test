<?php 
 
session_start(); 

require '../autoload.php';

if (!$_SESSION['logon']){
    header("Location: login.php");
}

$acessoC = new AcessoController();
$userC = new UsuarioController();

 ?>
<!-- -->


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
                                    Acessos
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
                                        <button style="font-size: 14px" class="btn btn-success" onclick="window.open('cad_acesso.php', '_self')"> <i class="fa fa-plus"></i> ADD</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30" style="margin-top: 10px;">
                            <div class="col-md-12">

                                <div class="table-responsive m-b-40">

                                            <div id="contentLoading">
                                                <div id="loading"></div>
                                            </div>

                                            <div class="jumbotron" style="padding:5px">
                                                <table id='listarAcessos' class='table display table-hover table-borderless table-responsive table-data3'>
                                                       
                                                        <div id="tbody">
                                                        </div>
                                                        <br>
                                                </table>
                                            </div>
                                </div>
                                <hr />



                            </div>
                        </div>


<script type="text/javascript" src="../assets/js/paginadorAcessos.js"></script>

                        <!--
        <script type="text/javascript">
                $(document).ready(function(){
            
                //Aqui a ativa a imagem de load
                function loading_show(){
                    $('#loading').html("<img src='../assets/images/loading.gif'/>").fadeIn('fast');
                }
                
                //Aqui desativa a imagem de loading
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }       
                
                
                // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json
                function load_dados(valores, page, div)
                {
                    $.ajax
                        ({
                            type: 'POST',
                            dataType: 'html',
                            url: page,
                            beforeSend: function(){//Chama o loading antes do carregamento
                                loading_show();
                            },
                            data: valores,
                            success: function(msg)
                            {
                                loading_hide();
                                var data = msg;
                                $(div).html(data).fadeIn();
                            }
                        });
                }
                
                //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
                load_dados(null, 'acessos_inc.php', '#tbody');
                
                
                //Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
                //$('#pesquisaCliente').keyup(function(){
                $('#search').keyup(function(){
                    
                    var valores = $('#form_search').serialize()//o serialize retorna uma string pronta para ser enviada
                    
                    //pegando o valor do campo #search
                    var $param = $(this).val();
                    
                    if($param.length >= 1)
                    {
                        load_dados(valores, 'acessos_inc.php', '#tbody');
                        
                    }else
                    {
                        load_dados(null, 'acessos_inc.php', '#tbody');
                        
                    }
                });
            
                });

                
         </script>
     -->
        <!--Paginador -->


        <!--Paginador -->
 <!-- RODAPÉ -->
<?php include_once 'rodape.php'; ?>
<!-- RODAPÉ -->