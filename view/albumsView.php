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

  function displayAlbums($albums, $user_permissions, $genres){
    $this->smarty->assign('user_permissions', $user_permissions);
    $this->smarty->assign('albums', $albums);
    $this->smarty->assign('genres', $genres);
    $this->smarty->display('templates/sections/albums.tpl');
  }

  function showInfo($album){
    $this->smarty->assign('album', $album);
    $this->smarty->assign('first', true);
    return $this->smarty->display('templates/sections/infoModal.tpl');
  }
}
?>
