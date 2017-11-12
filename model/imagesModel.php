<?php
/**
*
*/
class imagesModel extends Model
{
  function saveImage($id_album ,$image){
    $finalDir = "images/albumImages/".uniqid().'album-'.$id_album.".jpg";
    move_uploaded_file($image, $finalDir);
    $sentence = $this->db->prepare('INSERT INTO imagen(id_album, ruta) VALUES(?,?)');
    $sentence->execute([$id_album, $finalDir]);
    return true;
  }
}
?>
