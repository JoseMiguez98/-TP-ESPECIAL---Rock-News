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

  function showInfo($album, $user_permissions){
    $this->smarty->assign('album', $album);
    $this->smarty->assign('first', true);
    $this->smarty->assign('user_permissions', $user_permissions);
    return $this->smarty->display('templates/sections/infoModal.tpl');
  }

  //Muestra las imagenes del album
  function showImages($id_album, $images){
    $this->smarty->assign('id_album', $id_album);
    $this->smarty->assign('images', $images);
    return $this->smarty->display('templates/sections/deleteImages.tpl');
  }
}
?>
