<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Delayed call</title>
    <link rel="stylesheet" href="{base_url}css/9lessons.css" type="text/css" />
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
    /*PARAMETRIZACION*/
    var datos = $.parseJSON('{datos}');
    var cantidad_item_x_pagina = {cantidad_item_x_pagina};
    var cantidad_total = {cantidad_total};
    var base_url = '{base_url}';
    var contenedor_de_la_lista = 'images';
    /*FIN PARAMETRIZACION*/
    </script>
    <script type="text/javascript" src="{base_url}js/dmfusion_scroll_vertical.js"></script>
</head>
<body>

<div id="container">
	<h1>Welcome to Delayed Call!</h1>
    
    <div id="body">
      <ul id="images"></ul>
    </div>
    <div id="last_msg_loader"></div>
</div>


</body>
</html>