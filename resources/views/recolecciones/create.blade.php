@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		Añadir Recolección
			<a href="{{ route('recolecciones.index') }}"" class="btn btn-default pull-right">Regresar</a>
		</h2>

		@include('recolecciones.fragment.error')

			{!! Form::open(array('route' => array('recolecciones.store', Auth::user()->id))) !!}
					@include('recolecciones.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('recolecciones.fragment.aside')
	</div>

@endsection