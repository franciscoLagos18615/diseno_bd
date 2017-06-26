@extends('layout')

@section('content')

<style>
	.thumbnail {
    padding:0px;
}
.panel {
	position:relative;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:100%;
	width:0;
	height:0;
	display:block;
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}
</style>

	<div class="col-sm-8">
		
		<h2>
			{{ $catastrofe->region }}
			<a href="{{ route('catastrofes.edit', $catastrofe->id) }}"" class="btn btn-default pull-right">Editar</a>
		</h2>
		<p>
			{{ $catastrofe->comuna }}
		</p>
		{!! $catastrofe->descripcion !!}
	</div>
	<div class="col-sm-4">
		<!--Comentario en HTML -->
		@include('catastrofes.fragment.aside')
	</div>
	
<div class="col-sm-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Apoyos Económicos</div>
		
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre medida</th>
					<th>Avance</th>
					<th>Fecha inicio</th>
					<th>Fecha de término</th>
					<th>Meta</th>
					<th>Recaudación actual</th>
					<th>Estado medida</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($apoyos_economicos as $apoyo)	
				<tr>
						<td>{{ $apoyo->id }}</td>
						<td>
						<strong>{{ $apoyo->nombre_medida }}</strong>
						</td>
						<td>
						<strong>{{ $apoyo->avance }}</strong>
						</td>
						<td>
						<strong>{{ $apoyo->fecha_inicio }}</strong>
						</td>
						<td>
						<strong>{{ $apoyo->fecha_termino }}</strong>
						</td>
						<td>
						<strong>{{ $apoyo->meta }}</strong>
						</td>
						<td>
						<strong>{{ $apoyo->recaudacion_actual }}</strong>
						</td>
						<td>
						<?php if(!$apoyo->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>

						</td>

						<td>
							<a href="{{ route('apoyoeconomico.show', $apoyo->id) }}" class="btn btn-link">Ver detalles</a>
						</td>
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
		{!! $apoyos_economicos->render() !!}
	</div>
</div>






	
@endsection

