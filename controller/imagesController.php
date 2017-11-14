<?php
require_once './model/imagesModel.php';
require_once './view/albumsView.php';

class imagesController extends securedController
{
  private $imagesModel;

  function __construct(){
    parent::__construct();
    $this->view = new albumsView();
    $this->imagesModel = new imagesModel();
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
      $this->imagesModel->saveImage($id_album, $tempDir);
    }
    return true;
  }

  public function displayImages($id_album){
    $images = $this->imagesModel->getImages($id_album[0]);
    $this->view->showImages($images);
  }

  public function deleteImages($id_album){
    if($this->user_permissions == 1){
      if(isset($_POST['imageCheck']) && !empty($_POST['imageCheck'])){
        $imagesID = $_POST['imageCheck'];
        foreach ($imagesID as $id_image) {
          $this->imagesModel->deleteImage($id_image);
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
