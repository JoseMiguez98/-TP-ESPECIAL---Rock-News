<?php
//Este controller funciona tanto para Albums como para Generos

include_once './view/modalView.php';
include_once './model/albumsModel.php';

class modalController extends securedController
{
  protected $view;
  protected $model;

  function __construct()
  {
    parent::__construct();
    $this->view = new modalView();
    $this->model = new albumsModel();
  }

  function show($params){
    $genres = $this->model->getGenres();
    if ($params[1] != 'undefined'){
      $id_element = $params[1];
      //El metodo se genera aqui para saber si pide un album o un genero
      $method = 'get'.$params[0];
      //Pide el elemento que necesita al modelo
      $element = $this->model->$method($id_element);
      return $this->view->displayEditModal($element, $genres, $params[0]);
    }
    else{
      $this->view->displayAddModal($genres, $params[0]);
    }
  }
}

?>
