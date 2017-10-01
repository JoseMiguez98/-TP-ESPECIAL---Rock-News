<?php
include_once 'libs/Smarty.class.php';

function index(){
  $title = 'Rock News!';
  $skayimage = '../images/skaytandilnew.jpg';
  $smarty = new Smarty();
  $smarty->assign('title', $title);
  $smarty->assign('skayimage', $skayimage);
  $smarty->display('templates/index.tpl');
  $smarty->debugging = true;
}

index();
 ?>
