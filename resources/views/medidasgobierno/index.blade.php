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
						<?php if(!$recoleccion->valida): ?>
						<?php echo "<strong style='color:red;'> NO </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> SI </strong>"; ?>
						<?php endif ?>

						</td>
						<td>
							<form action="{{ route('recolecciones.destroy', $recoleccion->id) }}" method="POST">

								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-link">Eliminar Medida</button>
							</form>
						</td>

						<td>
							{!! Form::model($recoleccion, ['route' => ['recolecciones.update', $recoleccion->id], 'method' => 'PUT']) !!}

								<div class="form-group">
								{!! Form::submit('Activar Medida', ['class' => 'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
						</td>
						<td>
							{!! Form::model($recoleccion, ['route' => ['medidasgobierno.update', $recoleccion->id_usuario], 'method' => 'PUT']) !!}

								<div class="form-group">
								{!! Form::submit('Bloquear usuario', ['class' => 'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
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
							<form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">

								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-link">Eliminar Medida</button>
							</form>
						</td>

						<td>
						<?php if(!$evento->valida): ?>
						<?php echo "<strong style='color:red;'> NO </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> SI </strong>"; ?>
						<?php endif ?>

						</td>

						<td>
							{!! Form::model($evento, ['route' => ['eventos.update', $evento->id], 'method' => 'PUT']) !!}

								<div class="form-group">
								{!! Form::submit('Activar Medida', ['class' => 'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
						</td>
						<td>
							{!! Form::model($evento, ['route' => ['medidasgobierno.update', $evento->id_usuario], 'method' => 'PUT']) !!}

								<div class="form-group">
								{!! Form::submit('Bloquear usuario', ['class' => 'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
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
							<form action="{{ route('voluntariados.destroy', $voluntariado->id) }}" method="POST">

								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-link">Eliminar Medida</button>
							</form>
						</td>
						<td>
						<?php if(!$voluntariado->valida): ?>
						<?php echo "<strong style='color:red;'> NO </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> SI </strong>"; ?>
						<?php endif ?>

						</td>

						<td>
							{!! Form::model($voluntariado, ['route' => ['voluntariados.update', $voluntariado->id], 'method' => 'PUT']) !!}

								<div class="form-group">
								{!! Form::submit('Activar Medida', ['class' => 'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
						</td>
						<td>
							{!! Form::model($voluntariado, ['route' => ['medidasgobierno.update', $voluntariado->id_usuario], 'method' => 'PUT']) !!}

								<div class="form-group">
								{!! Form::submit('Bloquear usuario', ['class' => 'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
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
					<th>Elementos Necesarios</th>
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
							<form action="{{ route('apoyoeconomico.destroy', $apoyoeconomico->id) }}" method="POST">

								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-link">Eliminar Medida</button>
							</form>
						</td>
						<td>
						<?php if(!$apoyoeconomico->valida): ?>
						<?php echo "<strong style='color:red;'> NO </strong>"; ?>
						<?php else: ?>
						<?php echo "<strong style='color:green;'> SI </strong>"; ?>
						<?php endif ?>

						</td>
						<td>
							{!! Form::model($apoyoeconomico, ['route' => ['apoyoeconomico.update', $apoyoeconomico->id], 'method' => 'PUT']) !!}

								<div class="form-group">
								{!! Form::submit('Activar Medida', ['class' => 'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
						</td>
						<td>
							{!! Form::model($apoyoeconomico, ['route' => ['medidasgobierno.update', $apoyoeconomico->id_usuario], 'method' => 'PUT']) !!}

								<div class="form-group">
								{!! Form::submit('Bloquear usuario', ['class' => 'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
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


