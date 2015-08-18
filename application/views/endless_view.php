<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Infinite Scroll Demo 3 - SitePoint</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

  <style type="text/css" media="screen">
    * { margin: auto; }
    body { background: #cee; font-family: Helvetica, Arial, Verdana, 'Lucida Grande', sans-serif; }
    h1 { text-align: center; margin:20px; }
    
    div.scrolleable { padding: 20px; margin: 10px auto; background: #bcd; width: 750px; }
    ul#list { width: 50px; height: 200px; overflow-y: scroll; }
    ul#images { height: 250px; text-align: center; list-style: none; overflow-y: scroll;}
    
    .endless_scroll_loader { position: fixed; top: 10px; right: 20px; }
  </style>

  <script type="text/javascript" src="{base_url}js/jquery.min.js"></script>

  <script type="text/javascript" src="{base_url}js/jquery.endless-scroll.js"></script>
  <script type="text/javascript" charset="utf-8">
    $(function() {    

        $('#images').endlessScroll({
            inflowPixels:0,
            fireOnce: false,
            fireDelay: false,
            loader: '<div class="loading"></div>',
            ceaseFire: function(i,pageSequence) {
                alert(pageSequence);
                if(pageSequence>0){
                    alert(page);
                }else{
                    $('div[data-page=-1]').remove();
                }
            },
            content: function(i,pageSequence) {
                var last_img = $("ul#images li:last");
                var ID = last_img[0]['value'];
                if(pageSequence>0){
                    $.ajax({
                        url: '{base_url}endless_more',
                        type: 'POST',
                        data: 'last_msg_id='+ID,
                        success: function(data){
                            if (data != ""){
                                last_img.after(data);
                            }
                            $('div#last_msg_loader').empty();
                        }
                    });
                }
            }
        });
    });
  </script>

</head>

<body>
    <h1>Infinite Scroll Demo 3</h1>
    
    <div class="scrolleable">
      <ul id="images">
        {datos}
        <li value="{id_usuarios}"><img src="//graph.facebook.com/{fbuid}/picture?width=200" alt="{nombre}" /></li>
        {/datos}
      </ul>
    </div>
</body>

</html>