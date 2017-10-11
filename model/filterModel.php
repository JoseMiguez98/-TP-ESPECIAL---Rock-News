<?php
/**
*
*/
class filterModel extends Model
{
  function getFilteredAlbums($filter){
    $sentence = $this->db->prepare('SELECT * from album WHERE genero=?');
    $sentence->execute([$filter[0]]);
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
