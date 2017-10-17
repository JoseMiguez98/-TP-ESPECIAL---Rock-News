<div class="dataMain">
  <h1 class="text-warning">Top Albums de Rock:</h1>
  <ul class="list-inline">
    <li>
      {if $user_permissions eq 1}
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Agregar</button>
      {/if}
    </li>
    <li>
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filtrar por Genero
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            {foreach from=$genres item=genre}
            <li><a href="#" class="genreFilter" data-target="{$genre['nombre']}" target="_self">{$genre['nombre']}</a></li>
            {/foreach}
          </ul>
        </div>
      </li>
      <li>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Mas info
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              {foreach from=$albums item=album}
              <li><a href="#" class="albumInfo" data-target="{$album['nombre']}" target="_self">{$album['nombre']}</a></li>
              {/foreach}
            </ul>
          </div>
        </li>
      </ul>



      <table class="table table-bordered table-condensed">
        <thead>
          <th>#</th>
          <th>Nombre</th>
          <th>Año</th>
          <th>Artista/Grupo</th>
          <th>Genero</th>
          <th>#Genero</th>
        </thead>
        <tbody>

          {foreach from=$albums item=album}
          <tr>
            <td>{$album['id_album']}</td>
            <td>{$album['nombre']}</td>
            <td>{$album['anio']}</td>
            <td>{$album['artista']}</td>
            <td>{$album['genero']}</td>
            <td>{$album['id_genero']}</td>
            {if $user_permissions eq 1}
            <td><a class="deleteButton" href="" id="{$album['id_album']}" data-target="deleteAlbum"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
            <td><a data-toggle="modal" data-target="#updateModal" href="" id="{$album['id_album']}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
            {/if}
          </tr>
          {/foreach}
        </tbody>
      </table>

      <div class="innerInfo"></div>
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

              <form method="post" id="updateForm" class="refreshForm" data-target='updateAlbum'>
                <label for="dropdown-album">ID Album:</label>
                <select class="form-control" id="dropdown-album" name="id_album">
                  {foreach from=$albums item=album}
                  <option>{$album['id_album']}</option>
                  {/foreach}
                </select>
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="All hope is gone" required>
                </div>
                <div class="form-group">
                  <label for="year">Año</label>
                  <input type="text" class="form-control" name="year" id="year" placeholder="1989" required>
                </div>
                <div class="form-group">
                  <label for="artist">Artista/Grupo</label>
                  <input type="text" class="form-control" name="artist" id="artist" placeholder="John Lennon" required>
                </div>
                <div class="form-group">
                  <label for="info">Descripción</label>
                  <input type="text" class="form-control" name="info" id="info" placeholder="Información extra">
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
              <button class="navLink btn btn-default btn-submitForm" data-dismiss="modal" data-target="updateForm">Actualizar</button>
            </div>
          </div>

        </div>
      </div>
      {/if}

    </div>
