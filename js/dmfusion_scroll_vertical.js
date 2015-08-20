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
        success: function(data){
            if (data != ""){
                if(buscar_desde==0){
                    $("ul#"+contenedor_de_la_lista).html(data);                        
                }else{
                    $("ul#"+contenedor_de_la_lista+" li:last").after(data);
                }
            }
            $('div#last_msg_loader').empty();
        }
	});
}

function last_msg_funtion(){
    var ID = $("ul#"+contenedor_de_la_lista+" li:last").attr("value");
    $('div#last_msg_loader').html('<img src="'+base_url+'images/bigLoader.gif">');
    init(ID);
    $('div#last_msg_loader').empty();
};  
    
$(document).ready(function(){
    init();

    $('#'+contenedor_de_la_lista).scroll(function(){
        if ($('#'+contenedor_de_la_lista).scrollTop() < 300){
            $('div#last_msg_loader').html('');
        }else{
            $('div#last_msg_loader').html('<a class="top"><img src="'+base_url+'images/flechaArriba.png"></a>');
        }
        
        if(typeof timeout == "number") {
            window.clearTimeout(timeout);
            delete timeout;
        }
        timeout = window.setTimeout( function(){
            if ($('#'+contenedor_de_la_lista).scrollTop() == $('#'+contenedor_de_la_lista)[0].scrollHeight - $('#'+contenedor_de_la_lista)[0].clientHeight){
                var numItems = parseInt($('ul#'+contenedor_de_la_lista+' li').length);
                console.log(numItems);

                if(cantidad_total > numItems){
                    last_msg_funtion();
                }else{
                    $('div#last_msg_loader').html('<a class="top"><img src="'+base_url+'images/flechaArriba.png"></a>');
                }    
            }
        }, 100);
    });
    
    $('div#last_msg_loader').on('click','.top', function(){
        $('#'+contenedor_de_la_lista).scrollTop(0);
    });
});