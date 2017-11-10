<?php
require_once './view/permissionsView.php';
require_once './model/permissionsModel.php';
require_once './model/userModel.php';

class permissionsController extends securedController
{
  protected $user_model;

  function __construct(){
    parent::__construct();
    $this->model = new permissionsModel();
    $this->user_model = new userModel();
    $this->view = new permissionsView();
  }

  function show(){
    $users = $this->user_model->getUsers();
    $this->view->displayUsers($users);
  }

  function change($id){
    $id_user = $id[0];
    $nPermiso = $this->model->changePermissions($id_user);
    if($id_user == $_SESSION['id']){
      //session_destroy();
      $_SESSION['permissions'] = !$_SESSION['permissions'];
      return 'same_user';
    }
    return $this->show();
  }
}
?>
