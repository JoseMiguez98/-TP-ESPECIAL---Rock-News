<?php
require_once '../model/comentariosModel.php';
require_once '../model/userModel.php';

/**
*
*/
class comentariosApiController extends ApiController
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
      return $this->json_response($data, 200);
      break;

      case 1:
      $data = $this->model->getComentario($params[0]);
      if($data){
        //Array auxiliar
        $dataUpdated=[];
        //A cada comentario le creo una key 'usuario'con su correspondiente usuario
        foreach ($data as $comment) {
          $comment['usuario'] = $this->userModel->getUser($comment['id_usuario'])['nombre_usuario'];
          array_push($dataUpdated, $comment);
        }
        return $this->json_response($dataUpdated, 200);
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

  function create($params=[]){
    if (sizeof($params) == 0){
      $data = $this->getJSONData();
      if(!empty($data)){
        $id_album = $data[0]->id_album;
        $comentario = $data[0]->comentario;
        $puntaje = $data[0]->puntaje;
        $this->model->createComentario($id_album, $comentario, $puntaje);
        return $this->json_response('Comentario posteado con exito!', 200);
      }
      else{
        return $this->json_response(false, 400);
      }
    }
    return $this->json_response(false, 400);
  }
}

?>
