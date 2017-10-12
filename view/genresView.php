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

  function displayGenres($genres, $user){
    if(!empty($user)){
    $this->smarty->assign('user', $user);
    }
    $this->smarty->assign('genres', $genres);
    $this->smarty->assign('admin', 'JoseMiguez98');
    $this->smarty->display('templates/sections/genres.tpl');
  }
}
 ?>
