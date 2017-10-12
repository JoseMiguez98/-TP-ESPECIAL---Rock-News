<?php
/**
*
*/
class signUpModel extends Model
{
  function saveUser($name, $last_name, $user_name, $user_password){
    $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
    $sentence = $this->db->prepare("INSERT INTO `usuario`(`nombre`, `apellido`, `nombre_usuario`, `password`) VALUES (?,?,?,?)");
    $sentence->execute([$name, $last_name, $user_name, $encrypted_password]);
  }
}
?>
