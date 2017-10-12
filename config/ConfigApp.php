<?php
  class ConfigApp{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      '' => 'indexController#show',
      'home' => 'newsController#show',
      'signUpForm' => 'signUpController#show',
      'signUp' => 'signUpController#store',
      'signIn' => 'signInController#show',
      'genresTable' => 'genresController#show',
      'albumsTable' => 'albumsController#show',
      'albumInfo' => 'albumsController#info',
      'addGenre' => 'genresController#add',
      'deleteGenre' => 'genresController#delete',
      'updateGenre' => 'genresController#update',
      'addAlbum' => 'albumsController#add',
      'deleteAlbum' => 'albumsController#delete',
      'updateAlbum' => 'albumsController#update',
      'filterGenre' => 'filterController#show',
      'verifyUser' => 'loginController#verify',
      'logout' => 'loginController#destroy',
    ];
  }
?>
