<?php
/**
*
*/
class userModel extends Model
{
  function getUser($id_usuario){
    $sentence = $this->db->prepare('SELECT nombre_usuario FROM usuario WHERE id_usuario=?');
    $sentence->execute([$id_usuario]);
    return $sentence->fetch(PDO::FETCH_ASSOC);
  }

  function getUsers(){
    $sentence = $this->db->prepare('SELECT * FROM usuario');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function createUser($user_name, $user_email, $user_password){
    $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
    $sentence = $this->db->prepare("INSERT INTO `usuario`(`nombre_usuario`, `email`, `password`) VALUES (?,?,?)");
    return $sentence->execute([$user_name, $user_email, $encrypted_password]);
  }

  function deleteUser($id){
    $sentence = $this->db->prepare("DELETE FROM usuario WHERE id_usuario=?");
    return $sentence->execute([$id]);
  }
}
?>
