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

  function displayAlbums($albums, $genres, $user){
    if(!empty($user)){
    $this->smarty->assign('user', $user);
    }
    $this->smarty->assign('albums', $albums);
    $this->smarty->assign('genres', $genres);
    $this->smarty->assign('admin', 'JoseMiguez98');
    $this->smarty->display('templates/sections/albums.tpl');
  }

  function showInfo($info){
    $this->smarty->assign('info', $info);
    return $this->smarty->display('templates/sections/albumInfo.tpl');
  }
}
 ?>
