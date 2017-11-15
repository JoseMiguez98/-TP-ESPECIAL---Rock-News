<?php

class securedApiController extends ApiController
{
  protected $user_permissions;
  //Verifico si hay un user loggeado, en caso de que no haya lo redirijo al login
  function __construct(){
    parent::__construct();
    session_start();
    if(isset($_SESSION['id'])){
      //Controlo si expiro el tiempo de la sesión
      if(time() - $_SESSION['LAST_ACTIVITY'] > 100000000000000000000000){
        session_destroy();
        header('Location:'.HOME);
      }
      //Actualizo el tiempo de sesión
      $_SESSION['LAST_ACTIVITY'] = time();
    }
    //Almaceno los permisos del usuario
    $this->user_permissions = $this->getPermissions();
  }

  function getPermissions(){
    if(isset($_SESSION['usuario'])){
      return $_SESSION['permissions'];
    }
    return 0;
  }
}

?>
