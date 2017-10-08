<?php
/**
 *
 */
class indexView extends View
{
  function showIndex(){
    $this->smarty->display('templates/index.tpl');
  }
}

 ?>
