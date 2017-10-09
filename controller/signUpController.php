<?php
include_once './view/signUpView.php';

class signUpController extends Controller
{

  function __construct()
  {
    $this->view = new signUpView();
  }

  function show(){
    $this->view->displayForm();
  }
}

 ?>
