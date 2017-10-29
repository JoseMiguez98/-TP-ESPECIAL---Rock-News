<?php
/**
 *
 */
class albumsView extends View
{

  function __construct()
  {
     parent::__construct();
  }

  function displayAlbums($albums, $user_permissions){
    $this->smarty->assign('user_permissions', $user_permissions);
    $this->smarty->assign('albums', $albums);
    $this->smarty->display('templates/sections/albums.tpl');
  }

  function showInfo($info){
    $this->smarty->assign('info', $info);
    return $this->smarty->display('templates/sections/albumInfo.tpl');
  }
}
 ?>
