<?php
  class ConfigApp{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      '' => 'indexController#show',
      'home' => 'newsController#show',
      'signUp' => 'signUpController#show',
      'genresTable' => 'genresController#show',
      'albumsTable' => 'albumsController#show',
      'addGenre' => 'genresController#add',
      'deleteGenre' => 'genresController#delete',
      'updateGenre' => 'genresController#update'
    ];
  }
?>
