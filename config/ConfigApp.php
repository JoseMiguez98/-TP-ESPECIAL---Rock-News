<?php
  class ConfigApp{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      '' => 'indexController#show',
      'home' => 'newsController#show',
      'signUp' => 'signUpController#show',
      'signIn' => 'signInController#show',
      'genresTable' => 'genresController#show',
      'albumsTable' => 'albumsController#show',
      'addGenre' => 'genresController#add',
      'deleteGenre' => 'genresController#delete',
      'updateGenre' => 'genresController#update',
      'addAlbum' => 'albumsController#add',
      'deleteAlbum' => 'albumsController#delete',
      'updateAlbum' => 'albumsController#update',
      'filterGenre' => 'filterController#show',
      'verifyUser' => 'loginController#verify'
    ];
  }
?>
