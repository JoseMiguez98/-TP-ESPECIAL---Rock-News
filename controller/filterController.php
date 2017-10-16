<?php
include_once './view/filterView.php';
include_once './model/filterModel.php';

class filterController extends securedController
{
  function __construct(){
    parent::__construct();
    $this->view = new filterView();
    $this->model = new filterModel();
  }

  function show($filter){
    $user_permissions = $this->getPermissions();
    $genres = $this->model->getGenres();
    $filteredAlbums = $this->model->getFilteredAlbums($filter);
    $this->view->displayFilteredAlbums($filteredAlbums, $genres, $user_permissions);
  }
}
 ?>
