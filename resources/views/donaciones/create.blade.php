@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		Añadir Recolección
			<a href="{{ route('donaciones.index') }}"" class="btn btn-default pull-right">Regresar</a>
		</h2>

		@include('donaciones.fragment.error')

			{!! Form::open(array('route' => array('donaciones.store', Auth::user()->id))) !!}
					@include('donaciones.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('donaciones.fragment.aside')
	</div>

@endsection