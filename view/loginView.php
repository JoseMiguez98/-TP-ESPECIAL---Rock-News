<?php
/**
 *
 */
class loginView extends View
{

  function __construct()
  {
     parent::__construct();
  }

  function showError($error){
    $this->smarty->assign('error', $error);
    return $this->smarty->display('templates/sections/sign_in.tpl');
  }

  function showSuccessLogged($userName){
    $this->smarty->assign('userName', $userName);
    return $this->smarty->display('templates/home.tpl');
  }
}

 ?>