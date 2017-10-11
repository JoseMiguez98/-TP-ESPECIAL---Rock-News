<?php
include_once './view/filterView.php';
include_once './model/filterModel.php';

class filterController extends Controller
{
  function __construct(){
    $this->view = new filterView();
    $this->model = new filterModel();
  }

  function show($filter){
    $genres = $this->model->getGenres();
    $filteredAlbums = $this->model->getFilteredAlbums($filter);
    $this->view->displayFilteredAlbums($filteredAlbums, $genres);
  }
}
 ?>
