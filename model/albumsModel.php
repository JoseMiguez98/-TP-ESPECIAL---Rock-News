<?php
/**
*
*/
class albumsModel extends Model
{
  function getAlbum($id){
    $sentence = $this->db->prepare('select * from album where id_album=?');
    $sentence->execute([$id]);
    return $sentence->fetch(PDO::FETCH_ASSOC);
  }

  function getAlbums(){
    $sentence = $this->db->prepare('select * from album');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function addAlbum($name, $year, $artist, $genre, $info){
    $id_genre = $this->getGenreID($genre);
    $sentence = $this->db->prepare("INSERT INTO `album`(`nombre`, `anio`, `artista`,`id_genero`, `descripcion`) VALUES (?,?,?,?,?)");
    return $sentence->execute([$name, $year, $artist, $id_genre['id_genero'], $info]);
  }

  function deleteAlbum($id_album){
    $sentence = $this->db->prepare("delete from album where id_album=?");
    return $sentence->execute([$id_album]);
  }

  function updateAlbum($name, $year, $artist, $genre, $id_album, $info){
    $id_genre =  $this->getGenreID($genre);
    $sentence = $this->db->prepare("UPDATE `album` SET `nombre` = ?, `anio` = ?, `artista` = ?, `id_genero` = ?, `descripcion` = ? WHERE `id_album` = ?");
    return $sentence->execute([$name, $year, $artist, $id_genre['id_genero'],  $info, $id_album]);
  }

  function getGenreID($genre){
    $id_genre_query = $this->db->prepare("SELECT id_genero FROM genero where nombre = ? limit 1");
    $id_genre_query->execute([$genre]);
    return $id_genre_query->fetch(PDO::FETCH_ASSOC);
  }

  function getInfo($album){
    $sentence = $this->db->prepare("SELECT descripcion FROM album WHERE nombre=?");
    $sentence->execute([$album[0]]);
    return $sentence->fetch(PDO::FETCH_ASSOC);
  }
}
?>
