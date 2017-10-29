<!-- Modal-Create -->
<div class="modal fade" id="createModal" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar</h4>
      </div>
      <div class="modal-body">

        <form method="post" id="createForm" class="refreshForm" data-target="addGenre">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Hard Rock!">
          </div>
          <div class="form-group">
            <label for="country">Pais/es de origen</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Argentina">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="navLink btn btn-default btn-submitForm" data-dismiss="modal" data-target="createForm">Agregar</button>
      </div>
    </div>

  </div>
</div>
