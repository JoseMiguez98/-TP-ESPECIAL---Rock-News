<?php
include_once './view/newsView.php';

class newsController extends Controller
{
  function __construct(){
    $this->view = new newsView();
    // $this->model = new newsModel();
  }

  function show(){
    $this->view->displayNews();
  }
}
 ?>
