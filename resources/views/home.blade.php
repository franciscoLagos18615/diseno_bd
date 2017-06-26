@extends('layouts.app')
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<body class="home">
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




</body>

























@endsection