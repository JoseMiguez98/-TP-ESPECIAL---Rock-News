<?php
//Clase encargada de controlar el funcionamiento del sistema, intermediario entre el View y el Model
define('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');

class Controller
{
  protected $view;
  protected $model;
}

?>
