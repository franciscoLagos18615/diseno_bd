@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
			Nombre medida: {{ $catastrofe->nombre_medida }}
			<a href="{{ route('voluntariados.create', 'id='.$catastrofe->id) }}" class="btn btn-default pull-right">Inscribirme</a>
		</h2>
		<h4>Dirección: 
			<strong>{{$catastrofe->direccion}}</strong>
		</h4>
		<h4>Tipo trabajo: 
			<strong>{{$catastrofe->tipo_trabajo}}</strong>
		</h4>
		<h4>Perfil voluntario: 
			<strong>{{$catastrofe->perfil_voluntario}}</strong>
		</h4>
		<h4>Personas necesarias: 
			<strong>{{$catastrofe->personas}}</strong>
		</h4>
		<h4>Avance: 				
		<?php if($catastrofe->avance<60): ?>
		<?php echo "<strong style='color:red;'> {$catastrofe->avance}% </strong>"; ?>
		<?php else: ?>
		<?php echo "<strong style='color:green;'> {$catastrofe->avance}% </strong>"; ?>
		<?php endif ?>
		</h4>
		<h4>Fecha término: 
		<strong>{{ $catastrofe->fecha_termino }}</strong>
		</h4>
		<h4>Días restantes: 
			<?php if ( (strtotime($catastrofe->fecha_termino) - time()) / (60*60*24)  < 0) :?>
				<?php echo 0;?>
			<?php else: ?>
				<?php echo round((strtotime($catastrofe->fecha_termino) - time())/(60*60*24)); ?>
			<?php endif; ?>
		</h4>
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('voluntariados.fragment.aside')
	</div>


<div class="row">
	<div class="col-xs-12">
		<hr>
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
						<strong>{{$com->usuario}}</strong> - {{$com->email}} <span class="text-muted">comentado a las: {{ $com->created_at }} </span> 
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
