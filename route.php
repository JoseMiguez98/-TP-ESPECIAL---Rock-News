<?php
include_once 'config/ConfigApp.php';
include_once 'controller/Controller.php';
include_once 'controller/securedController.php';
include_once 'view/View.php';
include_once 'model/Model.php';
include_once 'controller/newsController.php';
include_once 'controller/indexController.php';
include_once 'controller/signUpController.php';
include_once 'controller/genresController.php';
include_once 'controller/albumsController.php';
include_once 'controller/filterController.php';
include_once 'controller/loginController.php';
include_once 'controller/modalController.php';
include_once 'controller/permissionsController.php';


function parseURL($url){
  //Explodeo la url para convertirla en un array
  $urlExploded = explode('/' ,$_GET['action']);
  //Creo un nuevo array y en la posición 'action' le asigno la acción recibida
  $arrayReturn[ConfigApp::$ACTION] = $urlExploded[0];
  //Si esta seteado, llama al metodo array_slice(), lo que hace este metodo es crear un arrego a partir de una posición dada, en este caso desde la posición 1
  //Y se lo asigno a la posición 'params'
  $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded, 1) : null;

  return $arrayReturn;
}

if(isset($_GET['action'])){
  $parsedURL = parseURL($_GET['action']);
  $action = $parsedURL[ConfigApp::$ACTION];
  //Controlo si existe la accion pedida en el arreglo de acciones disponibles de 'ConfigApp.php'
  if(array_key_exists($action , ConfigApp::$ACTIONS)){
    $action = explode('#', ConfigApp::$ACTIONS[$action]);
    $controller = new $action[0]();
    $method = $action[1];
    $params = $parsedURL[ConfigApp::$PARAMS];
    if(isset($params) && $params != null){
      echo $controller->$method($params);
    }
    else{
      echo $controller->$method();
    }
  }
}
?>
