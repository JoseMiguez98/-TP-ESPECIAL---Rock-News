<?php
/**
 *
 */
class comentariosModel extends Model
{
  function getComentarios(){
    $sentencia = $this->db->prepare('SELECT * FROM comentario');
    $sentencia->execute([]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getComentario($id_comentario){
    $sentencia = $this->db->prepare('SELECT * FROM comentario WHERE id_comentario=?');
    $sentencia->execute([$id_comentario]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function deleteComentario($id_comentario){
    $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id_comentario=?');
    $sentencia->execute([$id_comentario]);
    return true;
  }

  function createComentario($id_album, $comentario, $puntaje){
    $sentencia = $this->db->prepare('INSERT INTO comentario(id_album,comentario,puntaje) VALUES(?,?,?)');
    $sentencia->execute([$id_album, $comentario, $puntaje]);
    return true;
  }
}

 ?>
