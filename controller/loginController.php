<?php
include_once './view/loginView.php';
include_once './model/loginModel.php';

class loginController extends Controller
{
  function __construct(){
    $this->view = new loginView();
    $this->model = new loginModel();
  }

  function verify(){
    $user = $_POST['userName'];
    $password = $_POST['userPassword'];
    if(!empty($user) && !empty($password)){
      $user = $this->model->getUser($user);
      if(!empty($user) && password_verify($password, $user[0]['password'])){
        session_start();
        $_SESSION['usuario'] = $user[0]['nombre_usuario'];
        $_SESSION['LAST_ACTIVITY'] = time();
        $_SESSION['admin'] = $user[0]['admin'];
        return 'success_logged';
      }

      else{
        $this->view->showError('Usuario o contraseña incorrecto/s');
      }
    }

    else{
      $this->view->showError('Campo usuario o contraseña vacio');
    }
  }

  function show(){
    $this->view->displayForm();
  }

  function destroy(){
    session_start();
    session_destroy();
    header('Location:'.HOME);
  }
}
?>
