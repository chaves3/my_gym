$(function(){

    $('nav.mobile').click(function(){


    var listaMenu = $("nav.mobile ul");

    if(listaMenu.is(':hidden')==true){

        var icone = $('.botao-menu-mobile').find('i');
        icone.removeClass('.bi bi-list');
        icone.addClass('.bi bi-x-circle');
        listaMenu.slideToggle();

    }else{
        var icone = $('.botao-menu-mobile').find('i');
        icone.removeClass('.bi bi-x-circle');
        icone.addClass('.bi bi-list');
        listaMenu.slideToggle();
    }

});

//exibir a pagina para o local onde quer ou seja sobre e servicos

if($('target').length > 0){
    //O elemento existe, vamos dar o scroll

    var elemento = "#"+$('target').attr('target');
    var divScroll = $(elemento).offset().top;
    $('html,body').animate({'scrollTop':divScroll}, 3000);
}

//carregar sem atualizar a pagina

carregarSemAtualizar();

function carregarSemAtualizar(){
    $('[realtime]').click(function(){
        var pagina = $(this).attr('realtime');
        $('.container-principal').hide();
        $('.container-principal').load(include_path+'pages/'+pagina+'.php');

        $('.container-principal').fadeIn(1000);
        return false;
    });
}

});