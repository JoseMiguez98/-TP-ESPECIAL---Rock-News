<?php
/**
*
*/
class permissionsModel extends Model
{
  function changePermissions($id){
    $sentence = $this->db->prepare("UPDATE `usuario` SET `admin` = !admin WHERE `id_usuario` = ?");
    return $sentence->execute([$id]);
  }
}
?>
