<?php
require_once '../model/albumsModel.php';
require_once '../model/comentariosModel.php';
require_once '../model/userModel.php';
require_once '../model/genresModel.php';
require_once 'securedApiController.php';

/**
*
*/
class albumsApiController extends ApiController
{
  private $genresModel;
  private $comentariosModel;
  private $userModel;

  function __construct()
  {
    parent::__construct();
    $this->model = new albumsModel();
    $this->genresModel = new genresModel();
    $this->comentariosModel = new comentariosModel();
    $this->userModel = new userModel();
  }

  function get($params=[]){
    switch (sizeof($params)) {
      case 0:
      $data = $this->model->getAlbums();
      $dataUpdated = [];
      foreach ($data as $album) {
        $album['genero'] = $this->genresModel->getGenre($album['id_genero'])['nombre'];
        array_push($dataUpdated, $album);
      }
      return $this->json_response($dataUpdated, 200);
      break;

      case 1:
      $data = $this->model->getAlbum($params[0]);
      if($data){
        $data['genero'] = $this->genresModel->getGenre($data['id_genero'])['nombre'];
        return $this->json_response($data, 200);
      }
      else{
        return $this->json_response(false, 404);
      }
      break;

      case 2:
      if($params[1] == 'comentarios'){
        $data = $this->comentariosModel->getComentariosAlbum($params[0]);
        //Si existen comentarios para ese album
        if($data){
          //Array auxiliar
          $dataUpdated = [];
          //A cada comentario traido de la BBDD le asigno su usuario correspondiente en la key "usuario:"
          foreach ($data as $comment) {
            $comment['usuario'] = $this->userModel->getUser($comment['id_usuario'])['nombre_usuario'];
            array_push($dataUpdated, $comment);
          }
          return $this->json_response($dataUpdated, 200);
        }
        //Si no existen comentarios para ese album
        else {
          return $this->json_response(false, 404);
        }
      }
      //Si no pidio comentarios como resource
      return $this->json_response(false, 400);
      break;

      default:
      return $this->json_response(false, 400);
      break;
    }
  }

  //   function delete($params=[]){
  //     switch (sizeof($params)) {
  //       case 0:
  //       return $this->json_response(false, 400);
  //       break;
  //
  //       case 1:
  //       $data = $this->model->getComentario($params[0]);
  //       if($data){
  //         $this->model->deleteComentario($params[0]);
  //         return $this->json_response('Comentario eliminado con exito', 200);
  //       }
  //       else{
  //         return $this->json_response(false, 404);
  //       }
  //       break;
  //
  //       default:
  //       return $this->json_response(false, 400);
  //       break;
  //     }
  //   }
  //
  //   function create($params=[]){
  //     if (sizeof($params) == 0){
  //       $data = $this->getJSONData();
  //       if(!empty($data)){
  //         $id_album = $data[0]->id_album;
  //         $comentario = $data[0]->comentario;
  //         $puntaje = $data[0]->puntaje;
  //         $this->model->createComentario($id_album, $comentario, $puntaje);
  //         return $this->json_response('Comentario posteado con exito!', 200);
  //       }
  //       else{
  //         return $this->json_response(false, 400);
  //       }
  //     }
  //     return $this->json_response(false, 400);
  //   }
}

?>
