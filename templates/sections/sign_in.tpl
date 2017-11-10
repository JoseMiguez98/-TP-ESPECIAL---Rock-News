<div class="dataMain">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    {if isset($error)}
    <div class="alert alert-danger" role="alert">{{$error}}</div>
    {/if}
    <form class='sessionForm' method='post' data-target="verifyUser">
      <div class="form-group">
        <label for="user_name">Nombre de usuario</label>
        <input type="text" class="form-control" name="userName" id="user_name" placeholder="heisenberg">
      </div>
      <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="userPassword" id="user_password">
      </div>
      <button type="submit" class="btn btn-default">Acceder</button>
    </form>
  </div>
</div>
<div class="dataFooter"></div>
