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

  function add(){
    if(isset($_POST['name']) && !empty($_POST['name'])){
      $name = $_POST['name'];
      $country = isset($_POST['country']) ? $_POST['country'] : 'Desconocido';
      $this->model->addGenre($name, $country);
      header('Location:'.HOME);
    }
    else { //Luego controlar excepcion
      header('Location:'.HOME);
    }
  }

  function delete($id_genre){
    $this->model->deleteGenre($id_genre[0]);
    header('Location:'.HOME);
  }

  function update(){
    if(isset($_POST['name']) && !empty($_POST['name'])){
      $name = $_POST['name'];
      $id_genre = $_POST['id_genre'];
      $country = isset($_POST['country']) ? $_POST['country'] : null;
      $this->model->updateGenre($name, $country, $id_genre);
      header('Location:'.HOME);
    }
    else { //Luego controlar excepcion
      header('Location:'.HOME);
    }

  }
}
?>
