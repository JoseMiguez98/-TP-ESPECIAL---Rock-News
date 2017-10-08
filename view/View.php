<?php
//Clase encagada de controlar la View, con sus respectivos metodos.
include_once 'libs/Smarty.class.php';

class View
{
  protected $smarty;

  //El constructor crea una nueva instancia de smarty ya que esta clase es el 'view'
  function __construct()
  {
    $this->smarty = new Smarty();
    $this->smarty->assign('title', 'Rock News!');
    $this->smarty->assign('home', HOME);
  }
}
