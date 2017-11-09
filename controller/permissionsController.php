<?php
include_once './view/permissionsView.php';
include_once './model/permissionsModel.php';

class permissionsController extends securedController
{
  function __construct(){
    parent::__construct();
    $this->model = new permissionsModel();
    $this->view = new permissionsView();
  }

  function show(){
    $users = $this->model->getUsers();
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
