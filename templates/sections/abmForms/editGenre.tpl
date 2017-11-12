<!-- Modal-Update -->
<div class="modal fade" id="abmModal" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar</h4>
      </div>
      <div class="modal-body">

        <form method="post" id="updateForm" class="refreshForm" data-target="updateGenre">
          <input type="hidden" name="id_genre" value="{$element['id_genero']}">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Hard Rock!" value="{$element['nombre']}">
          </div>
          <div class="form-group">
            <label for="country">Pais/es de origen</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Argentina" value="{$element['pais_origen']}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="navLink btn btn-default btn-submitForm" data-dismiss="modal" data-target="updateForm">Actualizar</button>
      </div>
    </div>

  </div>
</div>
