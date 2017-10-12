<?php
include_once './view/signUpView.php';
include_once './model/signUpModel.php';

class signUpController extends Controller
{

  function __construct()
  {
    $this->model = new signUpModel();
    $this->view = new signUpView();
  }

  function show(){
    $this->view->displayForm();
  }

  function store(){
    if(!empty($_POST['name']) && !empty($_POST['last_name']) && !empty($_POST['user_name']) && !empty($_POST['user_password'])){
      $name = $_POST['name'];
      $last_name = $_POST['last_name'];
      $user_name = $_POST['user_name'];
      $user_password = $_POST['user_password'];
      $this->model->saveUser($name, $last_name, $user_name, $user_password);
      header('Location:'.HOME);
    }
  }
}

  ?>
