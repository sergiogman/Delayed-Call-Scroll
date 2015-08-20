<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Delayed call Horizontal</title>
    <link rel="stylesheet" href="{base_url}css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="{base_url}css/horizontal.css" type="text/css" />
  
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="{base_url}js/bootstrap.js"></script>
    <script type="text/javascript">
    /*PARAMETRIZACION*/
    var datos = $.parseJSON('{datos}');
    var cantidad_item_x_pagina = {cantidad_item_x_pagina};
    var cantidad_total = {cantidad_total};
    var base_url = '{base_url}';
    var contenedor_de_la_lista = 'images';
    /*FIN PARAMETRIZACION*/
    </script>
    <script type="text/javascript" src="{base_url}js/dmfusion_scroll_horizontal.js"></script>
</head>
<body>

<div id="container">
	<h1>Scroll Horizontal!</h1>
    
    <div id="horizontal">
        <div class="row">
            <span class="col-lg-6 anterior">anterior</span>
            <span class="col-lg-6 siguiente">siguiente</span>
        </div>
        <ul id="images" class="col-lg-12"></ul>
    </div>
    <div id="last_msg_loader"></div>
</div>


</body>
</html>