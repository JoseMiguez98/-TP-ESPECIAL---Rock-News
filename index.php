<?php
  include_once 'libs/Smarty.class.php';
  define('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');

  function index(){
    $title = 'Rock News!';
    $home = HOME;
    $smarty = new Smarty();
    $smarty->assign('title', $title);
    $smarty->assign('home', $home);
    // $smarty->debugging = true;
    $smarty->display('templates/index.tpl');
  }

  function home(){
    $smarty = new Smarty();
    $smarty->display('templates/home.tpl');
  }

  function signUp(){
    $smarty = new Smarty();
    $title = 'aa';
    $smarty->assign('title', $title);
    $smarty->display('templates/sections/sign_up.tpl');
  }
?>
