@extends('layout')

@section('content')

<div class="col-sm-12">
		
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
					<th>Direccion</th>
					<th>Hora</th>
					<th>Meta</th>
					<th>Recaudación actual</th>
					<th>Avance</th>
					<th>Fecha de término</th>
					<td>Dias restantes</td>
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
							<strong>{{$catastrofe->direccion}}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->hora}}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->meta}}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->recaudacion_actual}}</strong>
						</td>
						<td>						
						<?php if($catastrofe->avance<60): ?>
						<?php echo "<strong style='color:red;'> {$catastrofe->avance}% </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> {$catastrofe->avance}% </strong>"; ?>
						<?php endif ?>
						</td>
						<td>
						<strong>{{ $catastrofe->fecha_termino }}</strong>
						</td>
						<td>
							<?php if ( (strtotime($catastrofe->fecha_termino) - time()) / (60*60*24)  < 0) :?>
								<?php echo 0;?>
							<?php else: ?>
								<?php echo round((strtotime($catastrofe->fecha_termino) - time())/(60*60*24)); ?>
							<?php endif; ?>
						</td>
						<td>
						<?php if(!$catastrofe->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>
						</td>
						<td>
							<a href="{{ route('eventos.show', $catastrofe->id) }}" class="btn btn-link">Ver detalles</a>
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

@endsection


