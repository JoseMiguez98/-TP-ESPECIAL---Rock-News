<div class="dataMain">
  <h1 class="text-warning">Top Albums de Rock:</h1>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filtrar por Genero
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        {foreach from=$genres item=genre}
        <li><a href="#" class="genreFilter" data-target="{$genre['nombre']}" target="_self">{$genre['nombre']}</a></li>
        {/foreach}
      </ul>
    </div>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Mas info
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          {foreach from=$albums item=album}
          <li><a href="#" class="albumInfo" data-target="{$album['nombre']}" target="_self">{$album['nombre']}</a></li>
          {/foreach}
        </ul>
      </div>
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
          {if isset($user)}
          {if $user == $admin}
          <td><a class="deleteButton" href="" id="{$album['id_album']}" data-target="deleteAlbum"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
          {/if}
          {/if}
        </tr>
        {/foreach}
      </tbody>
    </table>
    <div class="innerInfo"></div>
  </div>

  <div class="dataFooter">
    {if isset($user)}
    {if $user == $admin}
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h2 class="text-warning">Agregar:</h2>
      <form method="post" data-target="addAlbum" class="refreshForm">
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
        <button type="submit" class="navLink btn btn-default">Agregar</button>
      </form>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h2 class="text-warning">Editar:</h2>
      <form method="post" data-target="updateAlbum" class="refreshForm">
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
          <input type="text" class="form-control" name="info" id="info" placeholder="Informacion extra">
        </div>
        <label for="dropdown-genre">Genero:</label>
        <select class="form-control" id="dropdown-genre" name="genre">
          {foreach from=$genres item=genre}
          <option>{$genre['nombre']}</option>
          {/foreach}
        </select>
        <button type="submit" class="navLink btn btn-default" target="_self">Actualizar</button>
      </form>
    </div>
    {/if}
    {/if}
  </div>
