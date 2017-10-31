<?php

class securedController extends Controller
{
  protected $user;
  protected $id_user;
  protected $user_permissions;
  //Verifico si hay un user loggeado, en caso de que no haya lo redirijo al login
  function __construct(){
    session_start();
    if(isset($_SESSION['id'])){
      $this->user = $_SESSION['usuario'];
      //Controlo si expiro el tiempo de la sesión
      if(time() - $_SESSION['LAST_ACTIVITY'] > 10000000000000000000000000000){
        header('Location:'.LOGOUT);
      }
      //Actualizo el tiempo de sesión
      $_SESSION['LAST_ACTIVITY'] = time();
    }
    else {
      $this->user='';
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
