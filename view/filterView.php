<?php
/**
 *
 */
class filterView extends View
{
  function displayFilteredAlbums($albums, $genres, $user_permissions){
    $this->smarty->assign('albums', $albums);
    $this->smarty->assign('genres', $genres);
    $this->smarty->assign('user_permissions', $user_permissions);
    $this->smarty->display('templates/sections/filterAlbum.tpl');
  }
}
 ?>
