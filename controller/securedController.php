<?php

class securedController extends Controller
{
  protected $user;
  //Verifico si hay un user loggeado, en caso de que no haya lo redirijo al login
  function __construct(){
    session_start();
    if(isset($_SESSION['usuario'])){
      $this->user = $_SESSION['usuario'];
        //Controlo si expiro el tiempo de la sesión
        if(time() - $_SESSION['LAST_ACTIVITY'] > 1000000000000000000000000000000000000){
          header('Location:'.LOGOUT);
          die();
        }
        //Actualizo el tiempo de sesión
        $_SESSION['LAST_ACTIVITY'] = time();
      }
    else {
      $this->user='';
    }
  }
}

?>
