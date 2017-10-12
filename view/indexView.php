<?php
/**
 *
 */
class indexView extends View
{
  function displayIndex($user){
    if(!empty($user)){
    $this->smarty->assign('user', $user);
    }
    $this->smarty->display('templates/index.tpl');
  }
}

 ?>
