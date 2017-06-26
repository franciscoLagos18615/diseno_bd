@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
		CREAR CATASTROFEdd
		{{ $catastrofe->id }}
			<a href="{{ route('catastrofes.index') }}"" class="btn btn-default pull-right">Regresar</a>
		}
		}
		}
		</h2>

		@include('catastrofes.fragment.error')

			{!! Form::open(['route' => 'catastrofes.store']) !!}

					@include('catastrofes.fragment.form')


			{!! Form::close() !!}
		
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('catastrofes.fragment.aside')
	</div>

@endsection