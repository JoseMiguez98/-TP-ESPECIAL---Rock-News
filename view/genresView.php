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

  function displayGenres($genres){
    $this->smarty->assign('genres', $genres);
    $this->smarty->display('templates/sections/genres.tpl');
  }
}
 ?>
