<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Onemi') }}</title>
    <link href="{{ asset('css/styleHome.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Onemi
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Ingresar a la Plataforma</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->usuario }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir de la Plataforma
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>









    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img src="http://4.bp.blogspot.com/-TySlNcm0RsI/TwD_602G1cI/AAAAAAAAArY/Dzxg3tyYen8/s1600/gobierno+de+chile+old.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="{{route('catastrofes.index')}}"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Catastrofes</span></a></li>
                        <li><a href="{{route('medidas.index')}}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Medidas</span></a></li>
                        <li><a href="{{route('apoyoeconomico.index')}}"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Apoyos Económicos</span></a></li>
                        <li><a href="{{route('recolecciones.index')}}"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Recolecciones</span></a></li>
                        <li><a href="{{route('eventos.index')}}"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Eventos</span></a></li>
                        <li><a href="{{route('voluntariados.index')}}"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Voluntariados</span></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>




        @yield('content')
    </div>

    <!-- Scripts -->
    <script>$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});
</script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
