{datos}
<li value="{indice}" class="open" data-toggle="modal" data-target="#myModal" data-id="{fbuid}">
    <p>{indice}</p>
    <p class="nya">{nombre} {apellido}</p>
    <img src="//graph.facebook.com/{fbuid}/picture?width=200" alt="{nombre}" />
</li>
{/datos}

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"></div></div></div>
<!-- Modal -->

<script type="text/javascript">
$(document).ready(function (e) {
    $('.open').click(function () {
        var data_id = $(this).data('id');
        $.ajax({
    		url: base_url+'modal',type: 'POST',
            data: 'fbuid='+data_id,
            success: function(data){
                if (data != ""){
                    $('#myModal .modal-dialog').html(data);
                }
            }
    	});
    });
});
</script>