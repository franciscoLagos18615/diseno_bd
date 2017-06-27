@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
			Nombre medida: {{ $catastrofe->nombre_medida }}
			<a href="{{ route('voluntariados.edit', $catastrofe->id) }}" class="btn btn-default pull-right">Editar</a>
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

@endsection
