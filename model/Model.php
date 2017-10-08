<?php
//Clase encargada de controlar todo lo que es logica y procesamiento de datos
class Model
{
  protected $db;

  //Este constructor establece la conexión con la base de datos
  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'
    .'dbname=db_songs;charset=utf8'
    , 'root', '');
  }
}
 ?>
