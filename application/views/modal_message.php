  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      {datos}
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{nombre} {apellido}</h4>
      </div>
      <div class="modal-body">
        <p>Esta es la modal</p>
        <p><img src="//graph.facebook.com/{fbuid}/picture?width=200" alt="{nombre}" /></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      {/datos}
    </div>

  </div>