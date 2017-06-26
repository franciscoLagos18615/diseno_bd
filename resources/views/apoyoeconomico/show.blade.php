@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
			{{ $catastrofe->region }}
			<a href="{{ route('apoyoeconomico.edit', $catastrofe->id) }}"" class="btn btn-default pull-right">Editar</a>
		</h2>
		<p>
			{{ $catastrofe->comuna }}
		</p>
		{!! $catastrofe->descripcion !!}
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('apoyoeconomico.fragment.aside')
	</div>

@endsection
