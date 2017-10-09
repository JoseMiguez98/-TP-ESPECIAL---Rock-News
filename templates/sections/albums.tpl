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
        <td>{$album['año']}</td>
        <td>{$album['artista/grupo']}</td>
        <td>{$album['genero']}</td>
        <td>{$album['id_genero']}</td>
      </tr>
      {/foreach}
    </tbody>
  </table>
</div>
<div class="dataFooter"></div>
