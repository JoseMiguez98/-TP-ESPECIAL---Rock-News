<div class="dataMain">
  <h1 class="text-warning">Top SubGeneros del Rock:</h1>
  {if $user_permissions eq 1}
  <button type="button" class="btn btn-success toggle-modal-btn" data-toggle="modal" data-target="Genre">Agregar</button>
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
        <td><a href="#" class="modifyButton" id="{$genre['id_genero']}" data-target="deleteGenre"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
        <td><a class="toggle-modal-btn" data-toggle="modal" data-target="Genre" href="" id="{$genre['id_genero']}" data-target="updateAlbum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
        {/if}
      </tr>
      {/foreach}
    </tbody>
  </table>
</div>
<div class="dataFooter">
  {if $user_permissions eq 1}
  <div class="innerModal"></div>
  {/if}
</div>
