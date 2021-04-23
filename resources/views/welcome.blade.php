<!DOCTYPE html>
<html lang="en">
<head>
  <title>Yahaal Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
    </script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAHSpjJjG7vKjM43UUI6dImBQoPBomrqg"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">YAHAAL TEST</a>
    </div>
  </div>
</nav>

<div class="container">
    <router-view></router-view>
    <div id="app">
        <app></app>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

