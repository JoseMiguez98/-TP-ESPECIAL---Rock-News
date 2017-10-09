<?php
/**
 *
 */
class newsView extends View
{

  function __construct()
  {
     parent::__construct();
  }

  function displayNews(){
    $this->smarty->display('templates/home.tpl');
  }
}

 ?>
