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
    $genres = $this->model->getGenres();
    $this->view->displayAlbums($albums, $genres);
  }

  function add(){
    if(isset($_POST['name']) && !empty($_POST['name'])){
      $name = $_POST['name'];
      $year = isset($_POST['year']) ? $_POST['year'] : null;
      $artist = isset($_POST['artist']) ? $_POST['artist'] : null;
      $genre = $_POST['genre'];
      $this->model->addAlbum($name, $year, $artist, $genre);
      header('Location:'.HOME);
    }
    else{ //luego controlar excepcion
    header('Location:'.HOME);
    }
  }

  function delete($id_album){
    $this->model->deleteAlbum($id_album[0]);
    header('Location:'.HOME);
  }
}
?>
