<div class="dataMain">
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
      </tr>
      {/foreach}
    </tbody>
  </table>
</div>

<div class="dataFooter">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h2 class="text-warning">Agregar:</h2>
    <form action="addAlbum" method="post">
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
    <form action="updateAlbum" method="post">
      <label for="dropdown-album">ID Album:</label>
      <select class="form-control" id="dropdown-album" name="id_genre">
        {foreach from=$albums item=album}
        <option>{$album['id_album']}</option>
        {/foreach}
      </select>
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
        <input type="text" class="form-control" name="year" id="year" placeholder="John Lennon">
      </div>
      <label for="dropdown-genre">Genero:</label>
      <select class="form-control" id="dropdown-genre" name="genre">
        {foreach from=$genres item=genre}
        <option>{$genre['nombre']}</option>
        {/foreach}
      </select>
      <button type="submit" class="navLink btn btn-default">Actualizar</button>
    </form>
  </div>
</div>
