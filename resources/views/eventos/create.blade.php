@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		Añadir Evento

			<a href="{{ route('recolecciones.index') }}"" class="btn btn-default pull-right">Regresar</a>
		
		</h2>

		@include('eventos.fragment.error')

				{!! Form::open(['route' => 'eventos.store']) !!}

			@include('eventos.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('eventos.fragment.aside')
	</div>

@endsection