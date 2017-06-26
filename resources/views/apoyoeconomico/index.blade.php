@extends('layout')

@section('content')

	<div class="col-sm-8">
		
		<!-- <h2>
			Listado de ApoyosEconomicos
			<a href="{{ route('apoyoeconomico.create') }}" class="btn btn-primary pull-right">Añadir Catastrofe</a>
		</h2> -->
		@include('recolecciones.fragment.info')
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre medida</th>
					<th>Avance</th>
					<th>Fecha inicio</th>
					<th>Fecha de término</th>
					<th>Estado medida</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($catastrofes->items() as $catastrofe)	
				<tr>
						<td>{{ $catastrofe->id }}</td>
						<td>
						<strong>{{ $catastrofe->nombre_medida }}</strong>
						</td>
						<td>
						<strong>{{ $catastrofe->avance }}</strong>
						</td>
						<td>
						<strong>{{ $catastrofe->fecha_inicio }}</strong>
						</td>
						<td>
						<strong>{{ $catastrofe->fecha_termino }}</strong>
						</td>
						<td>
						<?php if(!$catastrofe->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>

						</td>

<!-- 						<td>
							<a href="{{ route('apoyoeconomico.show', $catastrofe->id) }}" class="btn btn-link">Ver detalles</a>
						</td> -->
<!-- 						<td>
							<a href="{{ route('apoyoeconomico.create', $catastrofe->id) }}" class="btn btn-link">Agregar Recoleccion</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', $catastrofe->id) }}" class="btn btn-link">Agregar Apoyo Economico</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', $catastrofe->id) }}" class="btn btn-link">Agregar Evento</a>
						</td>
						<td>
							<a href="{{ route('recolecciones.create', $catastrofe->id) }}" class="btn btn-link">Agregar voluntariado</a>
						</td> -->
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


