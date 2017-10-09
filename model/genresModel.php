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

  function addGenre($name, $country){
    $sentence = $this->db->prepare('INSERT INTO genero(nombre, pais_origen) VALUES(?,?)');
    $sentence->execute([$name, $country]);
  }
}
 ?>
