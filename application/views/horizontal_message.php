<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Delayed call</title>
    <link rel="stylesheet" href="{base_url}css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="{base_url}css/horizontal.css" type="text/css" />
    <!--link rel="stylesheet" href="{base_url}css/infinite.css" type="text/css" /-->

    <script type="text/javascript">
    var base_url = "{base_url}";
    </script>
    
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="{base_url}js/plugins.js"></script>
    <script type="text/javascript" src="{base_url}js/sly.js"></script>
    <script type="text/javascript" src="{base_url}js/horizontal.js"></script>
    <!--script type="text/javascript" src="{base_url}js/infinite.js"></script-->

    
</head>
<body>

<div class="container">
	<h1>Welcome to Delayed Call!</h1>


    <div class="scrollbar">
        <div class="handle">
            <div class="mousearea"></div>
        </div>
    </div>
    
    <div class="frame" id="basic">
        <ul id="items" class="items clearfix">
        {datos}
            <li value="{mes_id}" class="message_box">
                <span class="number">{mes_id}</span> {msg} 
            </li>
        {/datos}
        </ul>
    </div>
</div>
</body>
</html>