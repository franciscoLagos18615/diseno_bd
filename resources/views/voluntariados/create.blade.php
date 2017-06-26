@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		Añadir Voluntariado

			<a href="{{ route('recolecciones.index') }}"" class="btn btn-default pull-right">Regresar</a>
		
		</h2>

		@include('voluntariados.fragment.error')

				{!! Form::open(['route' => 'voluntariados.store']) !!}

			@include('voluntariados.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('voluntariados.fragment.aside')
	</div>

@endsection