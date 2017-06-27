@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		Editar Producto > {{ Auth::user()->usuario }}
			<a href="{{ route('catastrofes.index') }}" class="btn btn-default pull-right">Editar</a>
		</h2>

			@include('catastrofes.fragment.error')


			{!! Form::model($catastrofe, ['route' => ['catastrofes.update', $catastrofe->id], 'method' => 'PUT']) !!}

				@include('catastrofes.fragment.form')


			{!! Form::close() !!}
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('catastrofes.fragment.aside')
	</div>

@endsection