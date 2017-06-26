@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		Añadir Elementos 
			<a href="{{ route('medidas.index') }}"" class="btn btn-default pull-right">Regresar</a>
		
		</h2>

		@include('elementos.fragment.error')

				{!! Form::open(['route' => 'elementos.store']) !!}

			@include('elementos.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('elementos.fragment.aside')
	</div>

@endsection