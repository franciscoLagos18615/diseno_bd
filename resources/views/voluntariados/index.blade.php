@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<h2>
			Listado de Catastrofes
		</h2>
		@include('recolecciones.fragment.info')
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Region</th>
					<th>Comuna</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($catastrofes->items() as $catastrofe)	
				<tr>
						<td>{{ $catastrofe->id }}</td>
						<td>
						<strong>{{ $catastrofe->region }}</strong>
						</td>
						<td>
						<strong>{{ $catastrofe->comuna }}</strong>
						</td>
						<td>
							<a href="{{ route('recolecciones.show', $catastrofe->id) }}" class="btn btn-link">Ver detalles</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', 'id='.$catastrofe->id) }}" class="btn btn-link">Agregar Recoleccion</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', $catastrofe->id) }}" class="btn btn-link">Agregar Apoyo Economico</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', $catastrofe->id) }}" class="btn btn-link">Agregar Evento</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', $catastrofe->id) }}" class="btn btn-link">Agregar voluntariado</a>
						</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $catastrofes->render() !!}
	</div>

	<div class="col-sm-4">
		<!--COLUMNA QUE ESTA AL COSTADO DE LA VISTA INDEX -->
		@include('catastrofes.fragment.aside')
	</div>

@endsection


