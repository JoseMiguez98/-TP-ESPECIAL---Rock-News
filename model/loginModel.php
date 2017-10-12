<?php
/**
*
*/
class loginModel extends Model
{
  function getUser($user){
    $sentence = $this->db->prepare("SELECT * FROM usuario WHERE nombre_usuario = ?");
    $sentence->execute([$user]);
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
