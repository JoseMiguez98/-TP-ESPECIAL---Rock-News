<div class="dataMain">
  <table class="table table-bordered table-condensed">
    <thead>
      <th>Usuario</th>
      <th>Permisos</th>
    </thead>
    <tbody>
      {foreach from=$users item=user}
      <tr>
        <td>{$user['nombre_usuario']}</td>
        {if $user['admin'] eq 1}
        <td>Admin</td>
        {else}
        <td>Usuario común</td>
        {/if}
        <td><a href="#" class="modifyButton" id="{$user['id_usuario']}" data-target="changePermissions"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
        <td><a href="#" class="modifyButton" id="{$user['id_usuario']}" data-target="deleteUser"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
        </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
  <div class="dataFooter"></div>
