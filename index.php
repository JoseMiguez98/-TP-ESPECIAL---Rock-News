<?php
include_once 'libs/Smarty.class.php';

function index(){
  $title = 'Rock News!';
  $smarty = new Smarty();
  $smarty->assign('title', $title);
  // $smarty->debugging = true;
  $smarty->display('templates/index.tpl');
}

index();
 ?>
