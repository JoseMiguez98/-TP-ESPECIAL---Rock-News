<?php
/**
 *
 */
class filterView extends View
{
  function displayFilteredAlbums($albums, $genres){
    $this->smarty->assign('albums', $albums);
    $this->smarty->assign('genres', $genres);
    $this->smarty->display('templates/sections/filterAlbum.tpl');
  }
}
 ?>
