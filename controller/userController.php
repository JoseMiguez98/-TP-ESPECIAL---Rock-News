<?php
include_once './view/signUpView.php';
include_once './model/userModel.php';

class userController extends securedController
{

  function __construct()
  {
    parent::__construct();
    $this->model = new userModel();
    $this->view = new permissionsView();
  }

  function create(){
    if(isset($_POST['userName']) && !empty($_POST['userName']) && isset($_POST['userPassword']) && !empty($_POST['userPassword']) && isset($_POST['userEmail']) && !empty($_POST['userEmail']))
    {
      $user_name = $_POST['userName'];
      $user_password = $_POST['userPassword'];
      $user_email = $_POST['userEmail'];
      $this->model->createUser($user_name, $user_email, $user_password);
      return 'success_registered';
    }
  }

  function delete($id_user){
    $this->model->deleteUser($id_user[0]);
    //Si el usuario borra su propia cuenta, se destruye la session y se le comunica a AJAX
    if($id_user[0] == $_SESSION['id']){
      session_destroy();
      return 'same_user';
    }
    $users = $this->model->getUsers();
    return $this->view->displayUsers($users);
  }
}

?>
