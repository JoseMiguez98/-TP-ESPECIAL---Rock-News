<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{$title}}</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <base href="{{$home}}">
</head>
<body>
  <div class="container-fluid">
    <header class="row titulo">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1>{{$title}}</h1>
      </div>
    </header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-de-navegacion" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="" target="_self">{{$title}}</a>
        </div>

        <div class="collapse navbar-collapse" id="barra-de-navegacion">
          <ul class="nav navbar-nav">
            <li><a href="#" class="navLink" data-target='home'>Pagina Principal<span class="sr-only">(current)</span></a></li>
            <li><a href="#" class="navLink" data-target='genresTable'>Top Generos</a></li>
            <li><a href="#" class="navLink" data-target='albumsTable'>Top Albums</a></li>
            {if isset($user)}
            {if $user_permissions eq 1}
            <li><a href="#" class="navLink" data-target='permissionsTable'>Permisos</a></li>
            {/if}
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$user}} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="logout" target="_self">Cerrar sesión</a></li>
                </ul>
              </li>
            </ul>
            {else}
            <li><a href="#" class="navLink" data-target='loginForm'>Iniciar sesión</a></li>
            {/if}
            <li><a href="#" class="navLink" data-target='signUpForm'>Registrarse</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="container-fluid">
