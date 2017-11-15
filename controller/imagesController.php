<?php
require_once './model/imagesModel.php';
require_once './view/albumsView.php';

class imagesController extends securedController
{

  function __construct(){
    parent::__construct();
    $this->view = new albumsView();
    $this->model = new imagesModel();
  }

  private function addImages($id_album){
    //Si alguna de las imagenes no es .jpg no agrego ninguna
    foreach ($_FILES['images']['type'] as $type) {
      if($type != 'image/jpeg'){
        return false;
      }
    }
    //Almaceno cada una de las imagenes en la BBDD
    foreach ($_FILES['images']['tmp_name'] as $tempDir) {
      $this->model->saveImage($id_album, $tempDir);
    }
    return true;
  }

  public function displayImages($id_album){
    $images = $this->model->getImages($id_album[0]);
    $this->view->showImages($id_album[0], $images);
  }

  public function deleteImages($id_album){
    if($this->user_permissions == 1){
      if(isset($_POST['imageCheck']) && !empty($_POST['imageCheck'])){
        $imagesID = $_POST['imageCheck'];
        $imagesPath=[];

        foreach ($imagesID as $id_image) {
          $imagePath = $this->model->getImagePath($id_image);
          $this->model->deleteImage($id_image);
          //Guardo la ruta de todas las imagenes en un array auxiliar para luego eliminarlas del disco
          array_push($imagesPath, $imagePath[0]['ruta']);
        }

        //Elimino todas las imagenes del disco
        foreach ($imagesPath as $path) {
          unlink($path);
        }

        return $this->displayImages($id_album);
      }
      return 'no_image_selected';
    }

    //Controlar excepcion si sobra tiempo
    else{
      header('Location:'.HOME);
    }
  }
}
?>
