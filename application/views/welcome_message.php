<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Delayed call</title>
    <link rel="stylesheet" href="{base_url}css/9lessons.css" type="text/css" />
</head>
<body>

<div id="container">
	<h1>Welcome to Delayed Call!</h1>


    <div id="body">
      <ul id="images"></ul>
    </div>
    <div id="last_msg_loader"></div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
var datos = $.parseJSON('{datos}');

function init(buscar_desde){
    if(buscar_desde==undefined){
        buscar_desde = 0;
    }else{
        buscar_desde = parseInt(buscar_desde) + 1 ;
    }
    
    var cantidad_item_x_pagina = {cantidad_item_x_pagina};
    var cantidad_total = {cantidad_total};
    var string = "[";
    for(i=buscar_desde;i<(parseInt(buscar_desde)+parseInt(cantidad_item_x_pagina));i++){
        string = string + JSON.stringify(datos[i]) + ",";
    }
    string = string.substring(0, string.length-1) + "]";
    
    $.ajax({
		url: '{base_url}more',type: 'POST',data: 'datos='+string,
        success: function(data){
            if (data != ""){
                if(buscar_desde==0){
                    $("ul#images").html(data);                        
                }else{
                    $("ul#images li:last").after(data);
                }
            }
            $('div#last_msg_loader').empty();
        }
	});
}

function last_msg_funtion(){
    var ID = $("ul#images li:last").attr("value");
    $('div#last_msg_loader').html('<img src="{base_url}images/bigLoader.gif">');
    init(ID);
    $('div#last_msg_loader').empty();
};  
    
$(document).ready(function(){
    init();

    $('#images').scroll(function(){
        if(typeof timeout == "number") {
            window.clearTimeout(timeout);
            delete timeout;
        }
        timeout = window.setTimeout( function(){
            if ($('#images').scrollTop() == $('#images')[0].scrollHeight - $('#images')[0].clientHeight){
                var numItems = parseInt($('ul#images li').length);
                console.log(numItems);
                var totalRegistros = parseInt("{cantidad_total}");
                
                if(totalRegistros > numItems){
                    last_msg_funtion();
                }else{
                    $('div#last_msg_loader').html('<a href="#top"><img src="{base_url}images/flechaArriba.png"></a>');
                }    
            }
        }, 100);
    });
});
</script>
</body>
</html>