<?php
/**
 *
 */
class genresModel extends Model
{
  function getGenres(){
    $sentence = $this->db->prepare('select * from genero');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }
}
 ?>
