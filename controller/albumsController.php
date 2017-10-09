<?php
include_once './view/albumsView.php';
include_once './model/albumsModel.php';

class albumsController extends Controller
{
  function __construct()
  {
    $this->model = new albumsModel();
    $this->view = new albumsView();
  }

  function show(){
    $albums = $this->model->getAlbums();
    $this->view->displayAlbums($albums);
  }
}
 ?>
