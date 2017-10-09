<div class="dataMain">
  <table class="table table-bordered table-condensed">
    <thead>
      <th>#</th>
      <th>Nombre</th>
    </thead>
    <tbody>
      {foreach from=$genres item=genre}
      <tr>
        <td>{$genre['id_genero']}</td>
        <td>{$genre['nombre']}</td>
      </tr>
      {/foreach}
    </tbody>
  </table>
</div>
<div class="dataFooter"></div>
