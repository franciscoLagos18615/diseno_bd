@extends('layout')

@section('content')

	<div class="col-sm-">
		
		<h2>
			Listado de Recolecciones
		</h2>
		@include('recolecciones.fragment.info')
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre Medida</th>
					<th>Fecha de inicio</th>
					<th>Fecha de termino</th>
					<th>Elementos Necesarios</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($recolecciones->items() as $recoleccion)	
				<tr>
						<td>{{ $recoleccion->id }}</td>
						<td>
						<strong>{{ $recoleccion->nombre_medida }}</strong>
						</td>
						<td>
						<strong>{{ $recoleccion->fecha_inicio }}</strong>
						</td>
						<td>
						<strong>{{ $recoleccion->fecha_termino }}</strong>
						</td>
						<td>
						<strong>{{ $recoleccion->elementos_necesarios }}</strong>
						</td>
						<td>
							<a href="{{ route('catastrofes.show', $recoleccion->id_catastrofe) }}" class="btn btn-link">Ver Catastrofe</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', 'id='.$recoleccion->id) }}" class="btn btn-link">Apoyar Medida</a>
						</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $recolecciones->render() !!}

		<h2>
			Listado de Eventos
		</h2>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre Medida</th>
					<th>Fecha de inicio</th>
					<th>Fecha de termino</th>
					<th>Elementos Necesarios</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($eventos->items() as $evento)	
				<tr>
						<td>{{ $evento->id }}</td>
						<td>
						<strong>{{ $evento->nombre_medida }}</strong>
						</td>
						<td>
						<strong>{{ $evento->fecha_inicio }}</strong>
						</td>
						<td>
						<strong>{{ $evento->fecha_termino }}</strong>
						</td>
						<td>
						<strong>{{ $evento->meta }}</strong>
						</td>
						<td>
							<a href="{{ route('catastrofes.show', $evento->id) }}" class="btn btn-link">Ver Catastrofe</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', 'id='.$evento->id) }}" class="btn btn-link">Apoyar Medida</a>
						</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $eventos->render() !!}
	</div>

		
		<div class="row">
			<div class="col-sm-8">
				<h2>
			Listado de Voluntariados
		</h2>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre Medida</th>
					<th>Fecha de inicio</th>
					<th>Fecha de termino</th>
					<th>Elementos Necesarios</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($voluntariados->items() as $voluntariado)	
				<tr>
						<td>{{ $voluntariado->id }}</td>
						<td>
						<strong>{{ $voluntariado->nombre_medida }}</strong>
						</td>
						<td>
						<strong>{{ $voluntariado->fecha_inicio }}</strong>
						</td>
						<td>
						<strong>{{ $voluntariado->fecha_termino }}</strong>
						</td>
						<td>
						<strong>{{ $voluntariado->meta }}</strong>
						</td>
						<td>
							<a href="{{ route('recolecciones.show', $voluntariado->id) }}" class="btn btn-link">Ver Catastrofe</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', 'id='.$voluntariado->id) }}" class="btn btn-link">Apoyar Medida</a>
						</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $eventos->render() !!}
	</div>
			</div>
		</div>

@endsection


