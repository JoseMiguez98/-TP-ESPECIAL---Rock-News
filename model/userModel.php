<?php
/**
*
*/
class userModel extends Model
{
  function getUsers(){
    $sentence = $this->db->prepare('SELECT * FROM usuario');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function createUser($user_name, $user_password){
    $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
    $sentence = $this->db->prepare("INSERT INTO `usuario`(`nombre_usuario`, `password`) VALUES (?,?)");
    return $sentence->execute([$user_name, $encrypted_password]);
  }

  function deleteUser($id){
    $sentence = $this->db->prepare("DELETE FROM usuario WHERE id_usuario=?");
    return $sentence->execute([$id]);
  }
}
?>
