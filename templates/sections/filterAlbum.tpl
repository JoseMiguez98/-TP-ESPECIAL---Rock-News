<div class="dataMain">
  <h1 class="text-warning">Top Albums de Rock:</h1>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filtrar por Genero
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="#" class="genreFilter" data-target="all" target="_self">Todos</a></li>
        {foreach from=$genres item=genre}
        <li><a href="#" class="genreFilter" data-target="{$genre['id_genero']}" target="_self">{$genre['nombre']}</a></li>
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
          {if $user_permissions eq 1}
          <td><a class="modifyButton" href="" data-target="deleteAlbum" id="{$album['id_album']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
          <td><a class="toggle-modal-btn" href="" data-target="Album" id="{$album['id_album']}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
          {/if}
        </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
  <div class="dataFooter">
    <div class="innerModal"></div>
  </div>
