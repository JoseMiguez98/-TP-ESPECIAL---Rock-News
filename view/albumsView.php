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

  function displayAlbums($albums){
    $this->smarty->assign('albums', $albums);
    $this->smarty->display('templates/sections/albums.tpl');
  }
}
 ?>
