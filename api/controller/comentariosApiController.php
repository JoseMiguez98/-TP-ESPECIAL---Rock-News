<?php
require_once '../model/comentariosModel.php';

/**
*
*/
class comentariosApiController extends ApiController
{

  function __construct()
  {
    parent::__construct();
    $this->model = new comentariosModel();
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
}

?>
