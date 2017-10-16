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
      $user_permissions = $this->getPermissions();      
      $albums = $this->model->getAlbums();
      $genres = $this->model->getGenres();
      $this->view->displayAlbums($albums, $genres, $user_permissions);
    }

    function add(){
      if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
        $info = isset($_POST['info']) ? $_POST['info'] : null;
        $year = isset($_POST['year']) ? $_POST['year'] : '0';
        $artist = isset($_POST['artist']) ? $_POST['artist'] : 'Desconocido';
        $genre = $_POST['genre'];
        $this->model->addAlbum($name, $year, $artist, $genre, $info);
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
        $info = isset($_POST['info']) ? $_POST['info'] : null;
        $id_album = $_POST['id_album'];
        $year = isset($_POST['year']) ? $_POST['year'] : 0000;
        $artist = isset($_POST['artist']) ? $_POST['artist'] : 'Desconocido';
        $this->model->updateAlbum($name, $year, $artist, $genre, $id_album, $info);
        return $this->show();
      }
      else { //Luego controlar excepcion
        header('Location:'.HOME);
      }
    }

    function info($album){
      $info = $this->model->getInfo($album);
      return $this->view->showInfo($info['descripcion']);
    }
  }
  ?>
