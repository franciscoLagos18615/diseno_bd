@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		Añadir Actividad 
			<a href="{{ route('medidasusuario.index') }}" class="btn btn-default pull-right">Regresar</a>
		
		</h2>
		

		@include('actividades.fragment.error')

				{!! Form::open(['route' => 'actividades.store']) !!}

			@include('actividades.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('actividades.fragment.aside')
	</div>

@endsection