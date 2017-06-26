@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		Editar Producto
			<a href="{{ route('recolecciones.index') }}"" class="btn btn-default pull-right">Editar</a>
		</h2>

			@include('recolecciones.fragment.error')


			{!! Form::model($catastrofe, ['route' => ['recolecciones.update', $catastrofe->id], 'method' => 'PUT']) !!}

				@include('recolecciones.fragment.form')


			{!! Form::close() !!}
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('recolecciones.fragment.aside')
	</div>

@endsection