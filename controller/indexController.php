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
    var_dump($this->user_permissions);
    $userLogged = $this->user;
    $this->view->displayIndex($userLogged, $this->user_permissions);
  }
}

 ?>
