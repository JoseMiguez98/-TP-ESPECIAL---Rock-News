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

  function addAlbum($name, $year, $artist, $genre){
    $id_genre_query = $this->db->prepare("SELECT id_genero FROM genero where nombre = ? limit 1");
    $id_genre_query->execute([$genre]);
    $id_genre  = $id_genre_query->fetch(PDO::FETCH_ASSOC);
    $sentence = $this->db->prepare("INSERT INTO `album`(`nombre`, `anio`, `artista`, `genero`, `id_genero`) VALUES (?,?,?,?,?)");
    $sentence->execute([$name, $year, $artist, $genre, $id_genre['id_genero']]);
  }
}
?>
