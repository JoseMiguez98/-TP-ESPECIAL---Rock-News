<div class="dataMain">
  <h1 class="text-warning">Top SubGeneros del Rock:</h1>
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
        <td><a href="deleteGenre/{$genre['id_genero']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
      </tr>
      {/foreach}
    </tbody>
  </table>
</div>
<div class="dataFooter">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h2 class="text-warning">Agregar:</h2>
    <form action="addGenre" method="post">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Hard Rock!">
      </div>
      <div class="form-group">
        <label for="country">Pais/es de origen</label>
        <input type="text" class="form-control" name="country" id="country" placeholder="Argentina">
      </div>
      <button type="submit" class="navLink btn btn-default">Agregar</button>
    </form>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h2 class="text-warning">Editar:</h2>
    <form action="updateGenre" method="post">
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
      <button type="submit" class="navLink btn btn-default">Actualizar</button>
    </form>
  </div>
</div>
