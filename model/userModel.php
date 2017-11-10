<?php
/**
*
*/
class userModel extends Model
{
  function getUsers(){
    $sentence = $this->db->prepare('select * from usuario');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function createUser($name, $last_name, $user_name, $user_password){
    $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
    $sentence = $this->db->prepare("INSERT INTO `usuario`(`nombre`, `apellido`, `nombre_usuario`, `password`) VALUES (?,?,?,?)");
    return $sentence->execute([$name, $last_name, $user_name, $encrypted_password]);
  }

  function deleteUser($id){
    $sentence = $this->db->prepare("DELETE FROM usuario WHERE id_usuario=?");
    return $sentence->execute([$id]);
  }
}
?>
