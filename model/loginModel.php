<?php
/**
*
*/
class loginModel extends Model
{
  function getUser($user){
    $sentence = $this->db->prepare("SELECT * FROM usuario WHERE nombre_usuario = ? OR email=?");
    $sentence->execute([$user, $user]);
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
