<?php
include_once './view/indexView.php';

class indexController extends securedController
{

  function __construct()
  {
    parent::__construct();
    $this->view = new indexView();
  }

  function show(){
    $userLogged = $this->user;
    $this->view->displayIndex($userLogged);
  }
}

 ?>
