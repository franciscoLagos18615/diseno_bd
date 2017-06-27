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
					<th>Estado Apoyo Economico</th>
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
						<?php if(!$recoleccion->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>

						</td>
						<td>
							<a href="{{ route('actividades.create', $recoleccion->id) }}" class="btn btn-link">añadir elementos</a>
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
					<th>Estado Apoyo Economico</th>
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
						<?php if(!$evento->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>

						</td>
						<td>
							<a href="{{ route('actividades.create', 'id='.$evento->id) }}" class="btn btn-link">Añadir Actividad</a>
						</td>
						
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $eventos->render() !!}
	</div>

		
		<div class="row">
			<div class="col-sm-12">
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
					<th>Estado Apoyo Economico</th>
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
						<?php if(!$voluntariado->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>
						</td>
						<td>
							<a href="{{ route('personas.create', 'id='.$voluntariado->id) }}" class="btn btn-link">Inscribirse</a>
						</td>
						<td>
							<a href="{{ route('personas.create', 'id='.$voluntariado->id) }}" class="btn btn-link">Inscbirse</a>
						</td>


				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $eventos->render() !!}

		<h2>
			Listado de Apoyos Economicos
		</h2>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre Medida</th>
					<th>Fecha de inicio</th>
					<th>Fecha de termino</th>
					<th>Estado Apoyo Economico</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($apoyoseconomicos->items() as $apoyoeconomico)	
				<tr>
						<td>{{ $apoyoeconomico->id }}</td>
						<td>
						<strong>{{ $apoyoeconomico->nombre_medida }}</strong>
						</td>
						<td>
						<strong>{{ $apoyoeconomico->fecha_inicio }}</strong>
						</td>
						<td>
						<strong>{{ $apoyoeconomico->fecha_termino }}</strong>
						</td>
						<td>
						<?php if(!$apoyoeconomico->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>

						</td>
						<td>
							<a href="{{ route('actividades.create', $apoyoeconomico->id) }}" class="btn btn-link">Donar</a>
						</td>
						
						
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $eventos->render() !!}
	</div>
	</div>
	</div>
		</div>

@endsection


