<?php
include_once './view/signInView.php';

class signInController extends Controller
{

  function __construct()
  {
    $this->view = new signInView();
  }

  function show(){
    $this->view->displayForm();
  }
}

 ?>
