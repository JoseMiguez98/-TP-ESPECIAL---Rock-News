<?php
/**
*
*/
class genresView extends View
{

  function __construct()
  {
    parent::__construct();
  }

  function displayGenres($genres, $user_permissions){
    $this->smarty->assign('genres', $genres);
    $this->smarty->assign('user_permissions', $user_permissions);
    $this->smarty->display('templates/sections/genres.tpl');
  }
}
?>
