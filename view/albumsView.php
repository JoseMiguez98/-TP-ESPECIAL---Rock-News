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

  function displayAlbums($albums, $genres){
    $this->smarty->assign('albums', $albums);
    $this->smarty->assign('genres', $genres);
    $this->smarty->display('templates/sections/albums.tpl');
  }
}
 ?>
