<?php
  class ConfigApp{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      '' => 'indexController#show',
      'home' => 'newsController#show',
      'signUpForm' => 'signUpController#show',
      'createUser' => 'userController#create',
      'loginForm' => 'loginController#show',
      'genresTable' => 'genresController#show',
      'albumsTable' => 'albumsController#show',
      'albumInfo' => 'albumsController#info',
      'addGenre' => 'genresController#add',
      'deleteGenre' => 'genresController#delete',
      'updateGenre' => 'genresController#update',
      'addAlbum' => 'albumsController#add',
      'showModal' => 'modalController#show',
      'deleteAlbum' => 'albumsController#delete',
      'updateAlbum' => 'albumsController#update',
      'filterGenre' => 'filterController#show',
      'verifyUser' => 'loginController#verify',
      'logout' => 'loginController#destroy',
      'permissionsTable' => 'permissionsController#show',
      'changePermissions' => 'permissionsController#change',
      'deleteUser' => 'userController#delete',
      'showImages' => 'imagesController#displayImages',
      'deleteImages' => 'imagesController#deleteImages'
    ];
  }
?>
