<?php
/**
 *
 */
class albumsModel extends Model
{
  function getAlbums(){
    $sentence = $this->db->prepare('select * from album');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }
}
 ?>
