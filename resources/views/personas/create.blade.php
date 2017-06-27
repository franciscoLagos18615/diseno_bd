@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
			Inscribirse al Voluntariado
			<a href="{{ route('medidasusuario.index') }}" class="btn btn-default pull-right">Regresar</a>
		
		</h2>
		

		@include('personas.fragment.error')

				{!! Form::open(['route' => 'personas.store']) !!}

			@include('personas.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('personas.fragment.aside')
	</div>

@endsection