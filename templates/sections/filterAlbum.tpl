<h1 class="text-warning">Top Albums de Rock:</h1>
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
      <td><a href="deleteAlbum/{$album['id_album']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
    </tr>
    {/foreach}
  </tbody>
</table>
