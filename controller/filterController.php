<?php
include_once './view/filterView.php';
include_once './model/filterModel.php';
include_once './view/albumsView.php';
include_once './model/genresModel.php';

class filterController extends securedController
{
  protected $albums_view;
  protected $albums_model;
  protected $genres_model;

  function __construct(){
    parent::__construct();
    $this->view = new filterView();
    $this->model = new filterModel();
    $this->album_view = new albumsView();
    $this->album_model = new albumsModel();
    $this->genres_model = new genresModel();
  }

  function show($filter){
    $user_permissions = $this->getPermissions();
    $genres = $this->genres_model->getGenres();
    if($filter[0] == 'all'){
      $albums = $this->album_model->getAlbums();
      return $this->album_view->displayAlbums($albums, $user_permissions, $genres);
    }
    $filteredAlbums = $this->model->getFilteredAlbums($filter);
    return $this->view->displayFilteredAlbums($filteredAlbums, $genres, $user_permissions);
  }
}
?>
