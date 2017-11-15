<?php
require_once '../model/comentariosModel.php';
require_once '../model/userModel.php';
require_once 'securedApiController.php';
/**
*
*/
class comentariosApiController extends securedApiController
{
  private $userModel;

  function __construct()
  {
    parent::__construct();
    $this->model = new comentariosModel();
    $this->userModel = new userModel();
  }

  function get($params=[]){
    switch (sizeof($params)) {
      case 0:
      $data = $this->model->getComentarios();
      //Array auxiliar
      $dataUpdated = [];
      //Pido el user de cada comentario y agrego una key "usuario:" al JSON de comentario
      foreach ($data as $comment) {
        $comment['usuario'] = $this->userModel->getUser($comment['id_usuario'])['nombre_usuario'];
        //Inserto el comentario actualizado en el array auxiliar
        array_push($dataUpdated, $comment);
      }
      return $this->json_response($dataUpdated, 200);
      break;

      case 1:
      $data = $this->model->getComentario($params[0]);
      if($data){
        $data['usuario'] = $this->userModel->getUser($data['id_usuario'])['nombre_usuario'];
        return $this->json_response($data, 200);
      }
      else{
        return $this->json_response(false, 404);
      }
      break;

      default:
      return $this->json_response(false, 400);
      break;
    }
  }

  function delete($params=[]){
    if($this->user_permissions == 1){
      switch (sizeof($params)) {
        case 0:
        return $this->json_response(false, 400);
        break;

        case 1:
        $data = $this->model->getComentario($params[0]);
        if($data){
          $this->model->deleteComentario($params[0]);
          return $this->json_response('Comentario eliminado con exito', 200);
        }
        else{
          return $this->json_response(false, 404);
        }
        break;

        default:
        return $this->json_response(false, 400);
        break;
      }
    }
    //Si no tiene permisos retorno 401-Unauthorized
    else{
      return $this->json_response(false, 401);
    }
  }

  function create($params=[]){
    if(isset($_SESSION['usuario'])){
      if (sizeof($params) == 0){
        $data = $this->getJSONData();
        if(!empty($data)){
          $id_album = $data->id_album;
          $comentario = $data->comentario;
          $puntaje = $data->puntaje;
          $fecha = $data->fecha;
          $id_usuario = $_SESSION['id'];
          if(!empty($comentario)){
            $this->model->createComentario($id_album, $id_usuario, $comentario, $puntaje, $fecha);
            return $this->json_response('Comentario posteado con exito!', 200);
          }
          //Si el campo comentario esta vacio retorno 400-Bad Request
          return $this->json_response(false, 400);
        }
        //Si no envian datos retorno 400-Bad request
        else{
          return $this->json_response(false, 400);
        }
      }
      //Si vienen parametros por POST retorno 400-Bad request
      return $this->json_response(false, 400);
    }
    //Si no esta loggeado retorno 401-Unauthorized
    return $this->json_response(false, 401);
  }
}

?>
