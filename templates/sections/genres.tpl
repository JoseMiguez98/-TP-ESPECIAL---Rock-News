<div class="dataMain">
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
      </tr>
      {/foreach}
    </tbody>
  </table>
</div>
<div class="dataFooter">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <form action="addGenre" method="post">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Hard Rock!">
      </div>
      <div class="form-group">
        <label for="country">Pais/es de origen</label>
        <input type="text" class="form-control" name="country" id="country" placeholder="Argentina">
      </div>
      <button type="submit" class="btn btn-default">Agregar</button>
    </form>
  </div>
</div>
