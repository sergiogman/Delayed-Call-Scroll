function init(buscar_desde, direction){
    if(buscar_desde==undefined){
        buscar_desde = 0;
        $('.anterior').hide();
    }
    
    if(direction==undefined){
        direction = "right";
    }else if(direction=="left"){
        buscar_desde = parseInt(buscar_desde);
    }else if(direction=="right"){
        buscar_desde = parseInt(buscar_desde) + 1 ;
    }
    
    var string = "[";
    
    if(direction == "right"){
        
        if( (parseInt(buscar_desde) + parseInt(cantidad_item_x_pagina)) >= cantidad_total){
            $('.siguiente').hide();
        }
        
        for(i=buscar_desde;i<(parseInt(buscar_desde)+parseInt(cantidad_item_x_pagina));i++){
            if(datos[i] != undefined){
                string = string + JSON.stringify(datos[i]) + ",";
            }
        }
        string = string.substring(0, string.length-1) + "]";
    }else{
        if((parseInt(buscar_desde)-parseInt(cantidad_item_x_pagina)) == 0){
            $('.anterior').hide();
        }
        if( (parseInt(buscar_desde) - parseInt(cantidad_item_x_pagina)) < cantidad_total){
            $('.siguiente').show();
        }
        
        for(i=(parseInt(buscar_desde)-parseInt(cantidad_item_x_pagina));i<buscar_desde;i++){
            if(datos[i] != undefined){
                string = string + JSON.stringify(datos[i]) + ",";
            }
        }
        string = string.substring(0, string.length-1) + "]";
    }
    
    
    $.ajax({
		url: base_url+'more',type: 'POST',data: 'datos='+string,
        success: function(data){
            if (data != ""){
                $("ul#"+contenedor_de_la_lista).html(data);
            }
            $('div#last_msg_loader').empty();
        }
	});
}

function past_msg_funtion(){
    var ID = $("ul#"+contenedor_de_la_lista+" li:first").attr("value");
    $('div#last_msg_loader').html('<img src="'+base_url+'images/bigLoader.gif">');
    init(ID,'left');
    $('div#last_msg_loader').empty();
};  

function last_msg_funtion(){
    var ID = $("ul#"+contenedor_de_la_lista+" li:last").attr("value");
    $('div#last_msg_loader').html('<img src="'+base_url+'images/bigLoader.gif">');
    init(ID,'right');
    $('.anterior').show();
    $('div#last_msg_loader').empty();
};  
    
$(document).ready(function(){
    init();
    
    $('.anterior').click(function(){
        past_msg_funtion();
    });

    $('.siguiente').click(function(){
        last_msg_funtion();
    });
    
    $('div#last_msg_loader').on('click','.top', function(){
        $('#'+contenedor_de_la_lista).scrollTop(0);
    });
});