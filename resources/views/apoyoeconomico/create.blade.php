@extends('layout')

@section('content')


	<div class="col-sm-8">
		<h2>
		Añadir Apoyo Económico
			<a href="{{ route('apoyoeconomico.index') }}"" class="btn btn-default pull-right">Regresar</a>
		</h2>

		@include('apoyoeconomico.fragment.error')

			{!! Form::open(array('route' => array('apoyoeconomico.store', Auth::user()->id))) !!}
					@include('apoyoeconomico.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('apoyoeconomico.fragment.aside')
	</div>

@endsection