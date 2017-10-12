<?php
include_once './view/albumsView.php';
include_once './model/albumsModel.php';

class albumsController extends securedController
{
  function __construct()
  {
    parent::__construct();
    $this->model = new albumsModel();
    $this->view = new albumsView();
  }

  function show(){
    if(isset($this->user)){
      $userLogged = $this->user;
    }
    $albums = $this->model->getAlbums();
    $genres = $this->model->getGenres();
    $this->view->displayAlbums($albums, $genres, $userLogged);
  }

  function add(){
    if(isset($_POST['name']) && !empty($_POST['name'])){
      $name = $_POST['name'];
      $year = isset($_POST['year']) ? $_POST['year'] : null;
      $artist = isset($_POST['artist']) ? $_POST['artist'] : null;
      $genre = $_POST['genre'];
      $this->model->addAlbum($name, $year, $artist, $genre);
      return $this->show();
    }
    else{ //luego controlar excepcion
      header('Location:'.HOME);
    }
  }

  function delete($id_album){
    $this->model->deleteAlbum($id_album[0]);
    return $this->show();
  }

  function update(){
    if(isset($_POST['name']) && !empty($_POST['name'])){
      $name = $_POST['name'];
      $genre = $_POST['genre'];
      $id_album = $_POST['id_album'];
      $year = isset($_POST['year']) ? $_POST['year'] : 0000;
      $artist = isset($_POST['artist']) ? $_POST['artist'] : 'Desconocido';
      $this->model->updateAlbum($name, $year, $artist, $genre, $id_album);
      return $this->show();
    }
    else { //Luego controlar excepcion
      header('Location:'.HOME);
    }
  }
}
?>
