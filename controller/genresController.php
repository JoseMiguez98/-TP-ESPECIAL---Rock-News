<?php
include_once './view/genresView.php';
include_once './model/genresModel.php';

class genresController extends securedController
{
  function __construct()
  {
    parent::__construct();
    $this->model = new genresModel();
    $this->view = new genresView();
  }

  function show(){
    $genres = $this->model->getGenres();
    $this->view->displayGenres($genres, $this->user_permissions);
  }

  function add(){
    if($this->user_permissions == 1){
      if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
        $country = isset($_POST['country']) ? $_POST['country'] : 'Desconocido';
        $this->model->addGenre($name, $country);
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

  function delete($id_genre){
    if($this->user_permissions == 1){
      $this->model->deleteGenre($id_genre[0]);
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
        $id_genre = $_POST['id_genre'];
        $country = isset($_POST['country']) ? $_POST['country'] : null;
        $this->model->updateGenre($name, $country, $id_genre);
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
}
?>
