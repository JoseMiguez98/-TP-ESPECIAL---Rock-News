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
    if(!empty($_POST['name']) && !empty($_POST['last_name']) && !empty($_POST['user_name']) && !empty($_POST['user_password'])){
      $name = $_POST['name'];
      $last_name = $_POST['last_name'];
      $user_name = $_POST['user_name'];
      $user_password = $_POST['user_password'];
      $this->model->createUser($name, $last_name, $user_name, $user_password);
      header('Location:'.HOME);
    }
  }

  function delete($id_user){
    $this->model->deleteUser($id_user[0]);
    if($id_user[0] == $_SESSION['id']){
      session_destroy();
      return 'same_user';
    }
    $users = $this->model->getUsers();
    return $this->view->displayUsers($users);
  }
}

?>
