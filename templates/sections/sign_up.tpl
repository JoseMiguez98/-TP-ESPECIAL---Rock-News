{include file='header.tpl'}
<form action="#" method='post'>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" placeholder="Jose">
  </div>
  <div class="form-group">
    <label for="last_name">Apellido</label>
    <input type="text" class="form-control" id="last_name" placeholder="Miguez">
  </div>
  <div class="form-group">
    <label for="user_name">Nombre de usuario</label>
    <input type="text" class="form-control" id="user_name" placeholder="heisenberg">
  </div>
  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" id="user_password">
  </div>
  <button type="submit" class="btn btn-default">Registrarse</button>
</form>
{include file='footer.tpl'}
