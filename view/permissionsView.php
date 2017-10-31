<?php
/**
 *
 */
class permissionsView extends View
{
  function displayUsers($users){
    $this->smarty->assign('users', $users);
    $this->smarty->display('templates/sections/permissions.tpl');
  }
}
 ?>
