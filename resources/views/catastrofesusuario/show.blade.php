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
		</h2>
		<p>
			{{ $catastrofe->comuna }}
		</p>
		{!! $catastrofe->descripcion !!}
	</div>

<?php if(count($apoyos_economicos)!=0): ?>
<div class="col-sm-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Apoyos Económicos</div>
		
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre medida</th>
					<th>Fecha inicio</th>
					<th>Fecha de término</th>
					<th>Meta</th>
					<th>Recaudación actual</th>
					<th>Días restantes</th>
					<th>Avance</th>
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
							<?php if ( (strtotime($apoyo->fecha_termino) - time()) / (60*60*24)  < 0) :?>
								<?php echo 0;?>
							<?php else: ?>
								<?php echo round((strtotime($apoyo->fecha_termino) - time())/(60*60*24)); ?>
							<?php endif; ?>
						</td>
						<td>
						<?php if($apoyo->avance<60): ?>
						<?php echo "<strong style='color:red;'> {$apoyo->avance}% </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> {$apoyo->avance}% </strong>"; ?>
						<?php endif ?>
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
<?php endif; ?>






<?php if(count($recolecciones)!=0): ?>
<div class="col-sm-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Recolecciones</div>

<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre medida</th>
					<th>Elementos necesarios</th>
					<th>Perfil voluntario</th>
					<th>Direccion</th>
					<th>Fecha de término</th>
					<td>Dias restantes</td>
					<th>Avance</th>
					<th>Estado medida</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($recolecciones->items() as $catastrofe)	
				<tr>
						<td>{{ $catastrofe->id }}</td>
						<td>
						<strong>{{ $catastrofe->nombre_medida }}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->elementos_necesarios}}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->perfil_voluntario}}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->direccion}}</strong>
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
						<?php if($catastrofe->avance<60): ?>
						<?php echo "<strong style='color:red;'> {$catastrofe->avance}% </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> {$catastrofe->avance}% </strong>"; ?>
						<?php endif ?>
						</td>
						<td>
						<?php if(!$catastrofe->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>
						</td>
						<td>
							<a href="{{ route('apoyoeconomico.show', $catastrofe->id) }}" class="btn btn-link">Ver detalles</a>
						</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $recolecciones->render() !!}
</div>
</div>
<?php endif; ?>


<?php if(count($eventos)!=0): ?>
<div class="col-sm-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Eventos</div>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre medida</th>
					<th>Direccion</th>
					<th>Hora</th>
					<th>Meta</th>
					<th>Recaudación actual</th>
					<th>Fecha de término</th>
					<td>Dias restantes</td>
					<th>Avance</th>
					<th>Estado medida</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($eventos->items() as $catastrofe)	
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
						<?php if($catastrofe->avance<60): ?>
						<?php echo "<strong style='color:red;'> {$catastrofe->avance}% </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> {$catastrofe->avance}% </strong>"; ?>
						<?php endif ?>
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
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $eventos->render() !!}
	</div>
</div>
<?php endif; ?>

<?php if(count($voluntariados)!=0): ?>
<div class="col-sm-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Voluntariados</div>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre medida</th>
					<th>Direccion</th>
					<th>Tipo de Trabajo</th>
					<th>Perfil voluntario</th>
					<th>Personas necesarias</th>
					<th>Fecha de término</th>
					<td>Dias restantes</td>
					<th>Avance</th>
					<th>Estado medida</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($voluntariados->items() as $catastrofe)	
				<tr>
						<td>{{ $catastrofe->id }}</td>
						<td>
						<strong>{{ $catastrofe->nombre_medida }}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->direccion}}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->tipo_trabajo}}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->perfil_voluntario}}</strong>
						</td>
						<td>
							<strong>{{$catastrofe->personas}}</strong>
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
						<?php if($catastrofe->avance<60): ?>
						<?php echo "<strong style='color:red;'> {$catastrofe->avance}% </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> {$catastrofe->avance}% </strong>"; ?>
						<?php endif ?>
						</td>
						<td>
						<?php if(!$catastrofe->valida): ?>
						<?php echo "<strong style='color:red;'> No aprobada </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> Aprobada </strong>"; ?>
						<?php endif ?>
						</td>
						<td>
							<a href="{{ route('voluntariados.show', $catastrofe->id) }}" class="btn btn-link">Ver detalles</a>
						</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $voluntariados->render() !!}
	</div>
</div>
<?php endif; ?>
	
@endsection

