<?php
require_once './view/albumsView.php';
require_once './model/albumsModel.php';
require_once './model/genresModel.php';
require_once './model/imagesModel.php';

class albumsController extends securedController
{
  private $genres_model;
  private $imagesModel;

  function __construct(){
    parent::__construct();
    $this->model = new albumsModel();
    $this->view = new albumsView();
    $this->genres_model = new genresModel();
    $this->imagesModel = new imagesModel();
  }

  function show(){
    $albums = $this->model->getAlbums();
    $albums_with_genres = $this->genres_model->getCurrentGenres($albums);
    $genres = $this->genres_model->getGenres();
    $this->view->displayAlbums($albums_with_genres, $this->user_permissions, $genres);
  }

  function add(){
    if($this->user_permissions == 1){
      if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
        $info = isset($_POST['info']) ? $_POST['info'] : null;
        $year = isset($_POST['year']) ? $_POST['year'] : '0';
        $artist = isset($_POST['artist']) ? $_POST['artist'] : 'Desconocido';
        $genre = $_POST['genre'];
        //Inserto el album y almaceno su ID
        $id_album = $this->model->addAlbum($name, $year, $artist, $genre, $info);
        //Luego de agregar el album en la BBDD agrego las imagenes
        $this->addImages($id_album);
        return $this->show();
      }
      else{ //luego controlar excepcion
        return $this->show();
      }
    }
    //Si no es admin el que envia el request se lo redirecciona al HOME
    else{
      header('Location:'.HOME);
    }
  }

  function delete($id_album){
    if($this->user_permissions == 1){
      $this->model->deleteAlbum($id_album[0]);
      return $this->show();
    }
    //Si no es admin el que envia el request se lo redirecciona al HOME
    else{
      header('Location:'.HOME);
    }
  }

  function update(){
    if($this->user_permissions == 1){
      if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
        $genre = $_POST['genre'];
        $info = isset($_POST['info']) ? $_POST['info'] : null;
        $id_album = $_POST['id_album'];
        $year = isset($_POST['year']) ? $_POST['year'] : 0000;
        $artist = isset($_POST['artist']) ? $_POST['artist'] : 'Desconocido';
        $this->model->updateAlbum($name, $year, $artist, $genre, $id_album, $info);
        $this->addImages($id_album);
        return $this->show();
      }
      else { //Luego controlar excepcion
        header('Location:'.HOME);
      }
    }
    //Si no es admin el que envia el request se lo redirecciona al HOME
    else{
      header('Location:'.HOME);
    }
  }

  function info($id_album){
    $album = $this->model->getAlbum($id_album[0]);
    $images = $this->model->getImages($id_album[0]);
    if($images){
      $album['imagenes'] = $images;
    }
    return $this->view->showInfo($album);
  }

  private function addImages($id_album){
    //Si alguna de las imagenes no es .jpg no agrego ninguna
    foreach ($_FILES['images']['type'] as $type) {
      if($type != 'image/jpeg'){
        return false;
      }
    }
    //Almaceno cada una de las imagenes en la BBDD
    foreach ($_FILES['images']['tmp_name'] as $tempDir) {
      $this->imagesModel->saveImage($id_album, $tempDir);
    }
    return true;
  }
}
?>
