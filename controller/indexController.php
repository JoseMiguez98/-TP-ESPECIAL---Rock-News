<?php
include_once './view/indexView.php';

class indexController extends Controller
{

  function __construct()
  {
    $this->view = new indexView();
  }

  function show(){
    $this->view->displayIndex();
  }
}

 ?>
