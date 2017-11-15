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

  function getImagePath($id_image){
    $sentence = $this->db->prepare("SELECT ruta FROM imagen WHERE id_imagen=?");
    $sentence->execute([$id_image]);
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function getImages($id_album){
    $sentence = $this->db->prepare("SELECT * FROM imagen WHERE id_album=?");
    $sentence->execute([$id_album]);
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function deleteImage($id_image){
    $sentence = $this->db->prepare("DELETE FROM imagen WHERE id_imagen=?");
    $sentence->execute([$id_image]);
    return true;
  }
}
?>
