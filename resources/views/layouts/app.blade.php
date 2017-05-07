<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>ViLife - @yield('title')</title>
	<meta name="keywords" content="@yield('meta-keywords')">
    <meta name="description" content="@yield('meta-keywords')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery.fancybox.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/animations.css') !!}
    {!! Html::style('css/bootstrap-tagsinput.css') !!}
    {!! Html::style('css/app.css') !!}
    
</head>
<body>
	<header>
	<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">ViLife</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Actualidad</a></li>
        <li><a href="/staff">Staff Médico</a></li>
        <li><a href="#">Biblioteca Nutricional</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::user())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Mi perfil <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/my">Historia Clinica</a></li>
            <li><a href="/planes">Planes de Alimentación</a></li>
            <li><a href="/consultas">Consultas</a></li>
            <li><a href="/">Visitas</a></li>
            <li><a href="/auth/logout">Salir</a></li>
          </ul>
        </li>
        @else
        <li class="active"><a href="/prices">Planes y Precios</a></li>
        <li><a href="/auth/login">Entrar</a></li>
        <li><a href="/auth/register">Crear Cuenta</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	</header>
		<div class="container">
			@include('flash::message')
     		@include('partials.errors')
			@yield('content')
		</div>
	<footer>
		<div class="container">
			<p>&copy; 2017 By Droni.co</p>
		</div>
	</footer>

	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/bootstrap3-typeahead.min.js') !!}
	{!! Html::script('js/css3-animate-it.js') !!}
  {!! Html::script('js/jquery.fancybox.pack.js') !!}
  {!! Html::script('js/bootstrap-tagsinput.min.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>