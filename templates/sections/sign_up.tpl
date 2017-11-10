<div class="dataMain">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <form action="createUser" method='post'>
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Jose" required>
      </div>
      <div class="form-group">
        <label for="last_name">Apellido</label>
        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Miguez" required>
      </div>
      <div class="form-group">
        <label for="user_name">Nombre de usuario</label>
        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="heisenberg" required>
      </div>
      <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" id="user_password" required>
      </div>
      <button type="submit" class="btn btn-default">Registrarse</button>
    </form>
  </div>
</div>
<div class="dataFooter"></div>
