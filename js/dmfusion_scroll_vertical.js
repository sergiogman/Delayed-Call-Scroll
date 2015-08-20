function init(buscar_desde){
    if(buscar_desde==undefined){
        buscar_desde = 0;
    }else{
        buscar_desde = parseInt(buscar_desde) + 1 ;
    }
    
    var string = "[";
    for(i=buscar_desde;i<(parseInt(buscar_desde)+parseInt(cantidad_item_x_pagina));i++){
        if(datos[i] != undefined){
            string = string + JSON.stringify(datos[i]) + ",";
        }
    }
    string = string.substring(0, string.length-1) + "]";
    
    $.ajax({
		url: base_url+'more',type: 'POST',data: 'datos='+string,
        beforeSend: function(){
            $('div#last_msg_loader').html('<img src="'+base_url+'images/bigLoader.gif">');
        },
        success: function(data){
            $('div#last_msg_loader').html('');
            if (data != ""){
                if(buscar_desde==0){
                    $("ul#"+contenedor_de_la_lista).html(data);                        
                }else{
                    $("ul#"+contenedor_de_la_lista+" li:last").after(data);
                    $('div#last_msg_loader').html('<a class="top"><img class="flecha" src="'+base_url+'images/flechaArriba.png?v=1"></a>');
                }
            }
        }
	});
}

function last_msg_funtion(){
    var numItems = parseInt($('ul#'+contenedor_de_la_lista+' li').length);
    if(cantidad_total > numItems){
        var ID = $("ul#"+contenedor_de_la_lista+" li:last").attr("value");
        init(ID);
    }  
};  
    
$(document).ready(function(){
    init();

    if(desde_marco == true) {
        $('#'+contenedor_de_la_lista).scroll(function(){
            if ($('#'+contenedor_de_la_lista).scrollTop() < 300){
                $('div#last_msg_loader').html('');
            }else{
                $('div#last_msg_loader').html('<a class="top"><img class="flecha" src="'+base_url+'images/flechaArriba.png?v=1"></a>');
            }
            
            if(typeof timeout == "number") {
                window.clearTimeout(timeout);
                delete timeout;
            }
            timeout = window.setTimeout( function(){
                if ($('#'+contenedor_de_la_lista).scrollTop() == $('#'+contenedor_de_la_lista)[0].scrollHeight - $('#'+contenedor_de_la_lista)[0].clientHeight){
                    last_msg_funtion();  
                }
            }, 100);
        });
    }else{
        $(window).scroll(function(){
            if(typeof timeout == "number") {
                window.clearTimeout(timeout);
                delete timeout;
            }
            
            if ($(window).scrollTop() < 300){
                $('div#last_msg_loader').html('');
            }else{
                $('div#last_msg_loader').html('<a class="top"><img class="flecha" src="'+base_url+'images/flechaArriba.png?v=1"></a>');
            }
            
            timeout = window.setTimeout( function(){
                if ($(window).scrollTop() == $(document).height() - $(window).height()){
                    last_msg_funtion();
                }
            }, 100);
        });        
    }
    
    $('div#last_msg_loader').on('click','.top', function(){
         if(desde_marco == true) {
            $('#'+contenedor_de_la_lista).animate({scrollTop: 0});
         }else{
            $("html, body").animate({scrollTop: 0});
         }
    });
});