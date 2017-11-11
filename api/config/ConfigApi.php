<?php
class ConfigApi
{
  public static $RESOURCE = 'resource';
  public static $PARAMS = 'params';
  public static $RESOURCES = [
    'comentarios#GET'=> 'comentariosApiController#get',
      'comentarios#DELETE'=> 'comentariosApiController#delete'
  ];
}
?>
