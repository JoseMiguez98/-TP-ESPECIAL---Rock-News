<?php
/**
 *
 */
class indexView extends View
{
  function displayIndex($user, $user_permissions){
    if(!empty($user)){
    $this->smarty->assign('user', $user);
    $this->smarty->assign('user_permissions', $user_permissions);
    }
    $this->smarty->display('templates/index.tpl');
  }
}

 ?>
