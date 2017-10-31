<?php
/**
*
*/
class permissionsModel extends Model
{
  function getUsers(){
    $sentence = $this->db->prepare('select * from usuario');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function changePermissions($id){
    $sentence = $this->db->prepare("UPDATE `usuario` SET `admin` = !admin WHERE `id_usuario` = ?");
    return $sentence->execute([$id]);
  }
}
?>
