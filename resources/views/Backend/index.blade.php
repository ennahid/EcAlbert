<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <title>@yield('title')</title>
  @extends('Backend.Links')
</head>
<body class="js-loading">
  <div class="preloader">
    <div class="loader">
      <span class="loader__indicator"></span>
      <h3>Ecole Albet</h3>
      <!-- <div class="loader__label"><img src="img/logo.png" alt=""></div> -->
    </div>
  </div>
  @extends('Backend.Header')

  @extends('Backend.Sidebar')

  <div class="page-content">
    <link rel="stylesheet" href="{{URL::asset('mycss/bootstrap-min-or.css')}}">
    @yield('content')


  @extends('Backend.Footer')

</body>

</html>
