<div class="dataMain">
  <h1 class="text-warning">Top SubGeneros del Rock:</h1>
  {if $user_permissions eq 1}
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Agregar</button>
  {/if}
  <table class="table table-bordered table-condensed">
    <thead>
      <th>#</th>
      <th>Nombre</th>
      <th>Pais/es de origen</th>
    </thead>
    <tbody>
      {foreach from=$genres item=genre}
      <tr>
        <td>{$genre['id_genero']}</td>
        <td>{$genre['nombre']}</td>
        <td>{$genre['pais_origen']}</td>
        {if $user_permissions eq 1}
        <td><a href="#" class="deleteButton" id="{$genre['id_genero']}" data-target="deleteGenre"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
        <td><a data-toggle="modal" data-target="#updateModal" href="" id="{$genre['id_genero']}" data-target="updateAlbum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
        {/if}
      </tr>
      {/foreach}
    </tbody>
  </table>
</div>
<div class="dataFooter">
  {if $user_permissions eq 1}
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

  <!-- Modal-Update -->
  <div class="modal fade" id="updateModal" role="dialog" >
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar</h4>
        </div>
        <div class="modal-body">

          <form method="post" id="updateForm" class="refreshForm" data-target="updateGenre">
            <label for="dropdown-genre">ID Genero:</label>
            <select class="form-control" id="dropdown-genre" name="id_genre">
              {foreach from=$genres item=genre}
              <option>{$genre['id_genero']}</option>
              {/foreach}
            </select>
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
          <button type="submit" class="navLink btn btn-default btn-submitForm" data-dismiss="modal" data-target="updateForm">Actualizar</button>
        </div>
      </div>

    </div>
  </div>

  {/if}
</div>
