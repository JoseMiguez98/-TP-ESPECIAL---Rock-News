
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

        <form method="post" id="createForm" class="refreshForm" data-target='addAlbum'>
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="All hope is gone">
          </div>
          <div class="form-group">
            <label for="year">Año</label>
            <input type="text" class="form-control" name="year" id="year" placeholder="1989">
          </div>
          <div class="form-group">
            <label for="artist">Artista/Grupo</label>
            <input type="text" class="form-control" name="artist" id="artist" placeholder="John Lennon">
          </div>
          <div class="form-group">
            <label for="info">Descripción</label>
            <input type="text" class="form-control" name="info" id="info" placeholder="Informacion extra">
          </div>
          <label for="dropdown-genre">Genero:</label>
          <select class="form-control" id="dropdown-genre" name="genre">
            {foreach from=$genres item=genre}
            <option>{$genre['nombre']}</option>
            {/foreach}
          </select>


        </form>
      </div>
      <div class="modal-footer">
        <button class="navLink btn btn-default btn-submitForm" data-dismiss="modal" data-target="createForm">Agregar</button>
      </div>
    </div>

  </div>
</div>
