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
        {datos}
            <div id="{mes_id}" class="message_box">
                <span class="number">{mes_id}</span> {msg} 
            </div>
        {/datos}
	</div>
    <div id="last_msg_loader"></div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
    function last_msg_funtion(){
        var ID = $(".message_box:last").attr("id");
        $('div#last_msg_loader').html('<img src="{base_url}images/bigLoader.gif">');

        $.ajax({
    		url: '{base_url}more',
            type: 'POST',
            data: 'last_msg_id='+ID,
            success: function(data){
                if (data != ""){
                    $(".message_box:last").after(data);
                }
                $('div#last_msg_loader').empty();
            }
    	});
    };  

    $(window).scroll(function(){
        if(typeof timeout == "number") {
            window.clearTimeout(timeout);
            delete timeout;
        }
        timeout = window.setTimeout( function(){
            if ($(window).scrollTop() == $(document).height() - $(window).height()){
                var numItems = parseInt($('.message_box').length);
                var totalRegistros = parseInt("{cantRanking}");
                
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