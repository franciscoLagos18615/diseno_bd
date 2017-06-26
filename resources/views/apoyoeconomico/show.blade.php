@extends('layout')

@section('content')
<style>
	<style>
	.thumbnail {
    padding:0px;
}
.panel {
	position:relative;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:100%;
	width:0;
	height:0;
	display:block;
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}
</style>
	<div class="col-sm-8">
		
		<h2>
			Nombre medida: {{ $catastrofe->nombre_medida }}
			<a href="{{ route('apoyoeconomico.edit', $catastrofe->id) }}"" class="btn btn-default pull-right">Editar</a>
		</h2>
		<p>
			<b>Avance:</b> {{ $catastrofe->avance }}
		</p>
		<p>
			<b>Recaudación Actual:</b> {!! $catastrofe->recaudacion_actual !!}
		</p>
		<p>
			<b>Meta: </b>{!! $catastrofe->meta !!}
		</p>

	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('apoyoeconomico.fragment.aside')
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<h3>Datos cuenta bancaria:</h3>
			
			<p>Número de cuenta: {{$cuenta[0]->numero_cuenta}}</p>
			<p>Banco: {{$cuenta[0]->banco}}</p>
			<p>Run: {{$cuenta[0]->run}}</p>
			<p>Tipo cuenta: {{$cuenta[0]->tipo_cuenta}}</p>
		</div>
	</div>




<div class="container">
		<div class="col-md-12 col-xs-10 col-lg-12">

		<!-- <form action="{{url('/apoyoeconomico/')  }}" method="POST"> -->
		<form action="{{ action('ComentariosController@store') }}" method="POST">
	           {{csrf_field()}}
	   
	           <div class="form-group">
	       	  <label for="descripcion">Escribir comentario</label>
	             <input class="form-control" name="descripcion" placeholder="Escribe un comentario..." type="text">
	           </div>

				<div class="form-group">
					{!! Form::hidden('id_muro',$catastrofe->id_muro) !!}
				</div>
	           
	                  
	           <input class="btn btn-primary" type="submit" value="Publicar">

	           
       </form>

	<h3>as</h3>

	<h3>List of comments</h3>
	<p>{{$comentarios}}</p>
	<hr>
		</div>
		
</div>

<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3>Comentarios </h3>
			</div><!-- /col-sm-12 -->
		</div><!-- /row -->
<?php foreach($comentarios as $com): ?>
		<div class="row">
			<div class="col-sm-1">
				<div class="thumbnail">
					<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
				</div><!-- /thumbnail -->
			</div><!-- /col-sm-1 -->

			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>myusername <?php echo $com->id_usuario ?> </strong> <span class="text-muted">commented {{ floor((date('Y-m-d H:i:s') - $com->created_at)/(60*60*24) )    }} days ago </span> 
					</div>
					<div class="panel-body">
						<?php echo $com->descripcion; ?>
					</div><!-- /panel-body -->
				</div><!-- /panel panel-default -->
			</div><!-- /col-sm-5 -->
		</div><!-- /row -->
<?php endforeach; ?>
	</div><!-- /container -->





@endsection
