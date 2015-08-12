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
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
    function last_msg_funtion(){ 
        var ID=$(".message_box:last").attr("id");
        $('div#body').html('<img src="{base_url}images/bigLoader.gif">');
        $.post("{base_url}?action=get&last_msg_id="+ID, function(data){
            if (data != ""){
                $(".message_box:last").after(data);
            }
            $('div#last_msg_loader').empty();
        });
    };  

    $(window).scroll(function(){
        if ($(window).scrollTop() == $(document).height() - $(window).height()){
            last_msg_funtion();
        }
    });
});
</script>
</body>
</html>