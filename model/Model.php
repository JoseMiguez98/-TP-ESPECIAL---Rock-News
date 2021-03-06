<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__.'/database/db-config.php');
//Clase encargada de controlar todo lo que es logica y procesamiento de datos
class Model
{

  protected $db;
  function __construct()
  {
    try {
      $this->db = new PDO('mysql:host='.DB_HOST.';'
      .'dbname='.DB_NAME.';charset=utf8'
      , DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
      $this->buildDDBBfromFile();
    }
  }
  public function buildDDBBfromFile()
  {
    try {
      $this->db = new PDO('mysql:host='.DB_HOST , DB_USER, DB_PASSWORD);
      $this->db->exec('CREATE DATABASE IF NOT EXISTS '.DB_NAME); //Creacion SQL
      $this->db->exec('USE '.DB_NAME); //Sentencia para usar por defecto la BBDD
      $sql = file_get_contents(DB_ARCHIVO);
      $this->db->exec($sql);
    }

    catch (Exception $e) {
      echo $e;
    }
  }
}
?>
