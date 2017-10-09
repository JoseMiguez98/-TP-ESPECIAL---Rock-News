<?php
include_once './view/genresView.php';
include_once './model/genresModel.php';

class genresController extends Controller
{
  function __construct()
  {
    $this->model = new genresModel();
    $this->view = new genresView();
  }

  function show(){
    $genres = $this->model->getGenres();
    $this->view->displayGenres($genres);
  }
}
 ?>
