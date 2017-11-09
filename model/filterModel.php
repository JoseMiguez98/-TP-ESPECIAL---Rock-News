<?php
/**
*
*/
class filterModel extends Model
{
  function getFilteredAlbums($filter){
    $sentence = $this->db->prepare('SELECT * from album WHERE id_genero=? ORDER BY nombre ASC');
    $sentence->execute([$filter[0]]);
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
