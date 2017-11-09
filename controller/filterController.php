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
      $albums_with_genres = $this->genres_model->getCurrentGenres($albums);
      return $this->album_view->displayAlbums($albums_with_genres, $user_permissions, $genres);
    }
    $filteredAlbums = $this->model->getFilteredAlbums($filter);
    $albums_with_genres = $this->genres_model->getCurrentGenres($filteredAlbums);
    return $this->view->displayFilteredAlbums($albums_with_genres, $genres, $user_permissions);
  }
}
?>
