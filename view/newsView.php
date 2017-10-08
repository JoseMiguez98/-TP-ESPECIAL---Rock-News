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

  function showNews(){
    $this->smarty->display('templates/home.tpl');
  }
}

 ?>
