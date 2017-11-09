<?php
/**
*
*/
class genresModel extends Model
{
  function addGenre($name, $country){
    $sentence = $this->db->prepare('INSERT INTO genero(nombre, pais_origen) VALUES(?,?)');
    $sentence->execute([$name, $country]);
  }

  function deleteGenre($id_genre){
    $sentence = $this->db->prepare("delete from genero where id_genero=?");
    return $sentence->execute([$id_genre]);
  }

  function updateGenre($name, $country, $id_genre){
    $sentence = $this->db->prepare("UPDATE `genero` SET `nombre` = ?, `pais_origen` = ? WHERE `genero`.`id_genero` = $id_genre");
    return $sentence->execute([$name, $country]);
  }

  function getGenres(){
    $sentence = $this->db->prepare('select * from genero');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function getGenre($id){
    $sentence = $this->db->prepare('select * from genero where id_genero=?');
    $sentence->execute([$id]);
    return $sentence->fetch(PDO::FETCH_ASSOC);
  }
}
?>
