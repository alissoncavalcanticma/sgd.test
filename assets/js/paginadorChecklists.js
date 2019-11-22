var pagina = 1; //página inicial - DEIXE SEMPRE 1
var numitens = 9; //quantidade de itens a ser mostrado por página

$(document).ready(function() {

    //Chamando função que lista os itens
    getitens(pagina, numitens);

});

//Aqui a ativa a imagem de load
function loading_show() {
    $('#loading').html("<img src='../assets/images/loading.gif'/>").fadeIn('fast');
}
//Aqui desativa a imagem de loading
function loading_hide() {
    $('#loading').fadeOut('fast');
}

// aqui a função ajax que busca os dados em outra pagina do tipo html, não é json
/*function load_dados(valores, page, div)
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
*/

//Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
//$('#pesquisaCliente').keyup(function(){
$('#search').keyup(function() {

    var valores = $('#form_search').serialize() //o serialize retorna uma string pronta para ser enviada
        //pegando o valor do campo #search
    var $param = $(this).val();

    if ($param.length >= 1) {

        getPesquisa(pagina, numitens, valores);
        //getPesquisa(pag, maximo, valores);
        //load_dados(valores, 'acessos_inc.php', '#tbody');

    } else {
        getitens(pagina, numitens);

    }
});

function getitens(pag, maximo) {
    pagina = pag;
    $.ajax({
        type: 'GET',
        data: 'tipo=listagem&pag=' + pag + '&maximo=' + maximo + '&acao=listar',
        //url:'getitens.php',
        url: '../controller/ResumoController.class.php',
        success: function(retorno) {
            $('#tbody').html(retorno);
            contador() //Chamando função que conta os itens e chama o paginador
        }
    })
}


function contador() {
    $.ajax({
        type: 'GET',
        data: 'tipo=contador&acao=listar',
        //url:'getitens.php',
        url: '../controller/ResumoController.class.php',
        success: function(retorno_pg) {
            paginador(retorno_pg);
        }
    })
}

function paginador(cont) {

    console.log(cont);
    console.log(numitens);
    console.log(pagina);

    if (cont <= numitens) { //Verificando se há mais de uma página

        $('#listarResumos').html("<tr><td><i style='color:#666666'>Apenas uma Página</><td><tr>");

    } else {

        $('#listarResumos').html('<tr class="pagination pg-blue pagination"></tr>');

        if (pagina != 1) {

            $('#listarResumos tr').append('<td><a  class="page-link" aria-label="Previous" href="#" onclick="getitens(' + (pagina - 1) + ', ' + numitens + ')"> << </a></td>')
        }

        var qtdpaginas = Math.ceil(cont / numitens); //arredondando divisão fracionada para cima

        /*for (var i = 1; i <= qtdpaginas; i++) {

            if (pagina == i) {

                $('#listarAcessos tr').append('<td  style="background: #6495ED"><a href="#" onclick="getitens(' + i + ', ' + numitens + ')">' + i + '</a></td>')

            } else {

                $('#listarAcessos tr').append('<td><a href="#" onclick="getitens(' + i + ', ' + numitens + ')">' + i + '</a></td>')
            }
        }*/
        if (pagina != qtdpaginas) {
            $('#listarResumos tr').append('<td><a class="page-link" aria-label="Next" href="#" onclick="getitens(' + (pagina + 1) + ', ' + numitens + ')"> >> </a></td>')
        }
        //console.log(cont);
        console.log("Chegou ao fim!");
    }
}

function getPesquisa(pag, maximo, valores) {
    pagina = pag;
    $.ajax({
        type: 'GET',
        data: 'tipo=listagem&pag=' + pagina + '&maximo=100&acao=listarPesquisa' + '&' + valores,
        //url:'getitens.php',
        url: '../controller/ResumoController.class.php',
        beforeSend: function() { //Chama o loading antes do carregamento
            loading_show();
        },
        success: function(retorno) {
            loading_hide();
            $('#tbody').html(retorno);
            contadorPesquisa(valores, pagina, maximo) //Chamando função que conta os itens e chama o paginador
        }
    })
}


function contadorPesquisa(valores, pagina, maximo) {
    $.ajax({
        type: 'GET',
        data: 'tipo=contador&acao=listarPesquisa' + '&' + valores,
        //url:'getitens.php',
        url: '../controller/ResumoController.class.php',
        success: function(retorno_pg) {
            paginadorPesquisa(retorno_pg, valores, pagina, maximo)
        }
    })
}



function paginadorPesquisa(cont, valores, pagina, maximo) {

    numitens = maximo;
    if (cont <= numitens) { //Verificando se há mais de uma página

        $('#listarResumos').html("<tr><td><i style='color:#666666'>Apenas uma Página</i><td><tr>");

    } else {

        $('#listarResumos').html('<tr class="pagination pg-blue pagination"></tr>');

        if (pagina != 1) {

            $('#listarResumos tr').append('<td><a  class="page-link" aria-label="Previous" href="#" onclick="getPesquisa(' + (pagina - 1) + ', ' + numitens + ', ' + valores + ')"> << </a></td>')
        }

        var qtdpaginas = Math.ceil(cont / numitens); //arredondando divisão fracionada para cima

        /*for(var i=1;i<=qtdpaginas;i++){

        	if(pagina==i){

        		$('#listarAcessos tr').append('<td  style="background: #6495ED"><a href="#" onclick="getitens('+i+', '+numitens+')">'+i+'</a></td>')

        	}else{

        		$('#listarAcessos tr').append('<td><a href="#" onclick="getitens('+i+', '+numitens+')">'+i+'</a></td>')
        		}
        }*/
        if (pagina != qtdpaginas) {
            $('#listarResumos tr').append('<td><a class="page-link" aria-label="Next" href="#" onclick="getPesquisa(' + (pagina + 1) + ', ' + numitens + ', ' + valores + ')"> >> </a></td>')
        }
        console.log(cont);
    }
}