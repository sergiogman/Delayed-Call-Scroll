<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Delayed call Vertical</title>
    <link rel="stylesheet" href="{base_url}css/bootstrap.min.css" />
    <link rel="stylesheet" href="{base_url}css/vertical.css" type="text/css" />
        
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="{base_url}js/bootstrap.js"></script>
    <script type="text/javascript">
    /*PARAMETRIZACION*/
    var datos = $.parseJSON('{datos}');
    var cantidad_item_x_pagina = {cantidad_item_x_pagina};
    var cantidad_total = {cantidad_total};
    var base_url = '{base_url}';
    var contenedor_de_la_lista = 'images';
    // true: desde div [style => overflow-y: scroll;] | false : desde window
    var desde_marco = true;
    /*FIN PARAMETRIZACION*/
    </script>
    <script type="text/javascript" src="{base_url}js/dmfusion_scroll_vertical.js"></script>
</head>
<body>

<div id="container">
	<h1>Scroll Vertical!</h1>
    
    <div id="body">
      <ul id="images"></ul>
    </div>
</div>

<div id="last_msg_loader"></div>

</body>
</html>