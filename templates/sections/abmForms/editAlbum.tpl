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

        <form method="post" id="updateForm" class="refreshForm" data-target='updateAlbum'>
          <input type="hidden" name="id_album" value="{$element['id_album']}">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="All hope is gone" value="{$element['nombre']}" required>
          </div>
          <div class="form-group">
            <label for="year">Año</label>
            <input type="text" class="form-control" name="year" id="year" placeholder="1989" value="{$element['anio']}" required>
          </div>
          <div class="form-group">
            <label for="artist">Artista/Grupo</label>
            <input type="text" class="form-control" name="artist" id="artist" placeholder="John Lennon" value="{$element['artista']}" required>
          </div>
          <div class="form-group">
            <label for="info">Descripción</label>
            <input type="text" class="form-control" name="info" id="info" placeholder="Información extra" value="{$element['descripcion']}">
          </div>
          <div class="form-group">
            <label for="images">Imagenes</label>
            <input type="file" name="images[]" id="images" accept="image/jpeg" multiple>
          </div>
          <label for="dropdown-genre">Genero:</label>
          <select class="form-control" id="dropdown-genre" name="genre">
            {foreach from=$genres item=genre}
            {if $genre['nombre'] == $element['genero']}
            <option selected>{$genre['nombre']}</option>
            {else}
            <option>{$genre['nombre']}</option>
            {/if}
            {/foreach}
          </select>


        </form>
      </div>
      <div class="modal-footer">
        <button class="navLink btn btn-default btn-submitForm" data-dismiss="modal" data-target="updateForm">Actualizar</button>
      </div>
    </div>

  </div>
</div>
