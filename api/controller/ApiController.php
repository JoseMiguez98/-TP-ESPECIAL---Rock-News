<?php
abstract class ApiController{
  protected $model;
  protected $raw_data;

  function __construct(){
    //Lee los datos pasados por post(raw_data) y los convierte a un JSON string
    $this->raw_data = file_get_contents("php://input");
  }

  //Retorna un JSON y le comunica el estado a HTTP
  protected function json_response($data, $status) {
    header("Content-Type: application/json");
    header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
    return json_encode($data);
  }

  //Retorna el mensaje de el estado HTTP
  protected function _requestStatus($code){
    $status = array(
      200 => "OK",
      404 => "Not found",
      400 => "Bad request",
      500 => "Internal Server Error"
    );
    return ($status[$code])? $status[$code] : $status[500];
  }

  //Devuelve el JSON string en formato php_array
  function getJSONData(){
    return json_decode($this->raw_data);
  }
}
?>
