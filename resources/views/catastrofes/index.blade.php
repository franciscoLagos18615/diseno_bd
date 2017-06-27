@extends('layout')

@section('content')

	<div class="col-sm-8">
		


		<h2>
			Listado de Catastrofes
			<a href="{{ route('catastrofes.create') }}" class="btn btn-primary pull-right">Añadir Catastrofe</a>
		</h2>
		@include('catastrofes.fragment.info')
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
							<a href="{{ route('catastrofes.show', $catastrofe->id) }}" class="btn btn-link">Ver detalles</a>
						</td>
						<td>
							<a href="{{ route('catastrofes.edit', $catastrofe->id) }}" class="btn btn-link">Editar</a>
						</td>
						<td>
						<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Agregar Medida
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li><a href="{{ route('apoyoeconomico.create', 'id='.$catastrofe->id) }}" class="btn btn-link">Apoyo Economico</a></li>
						    <li><a href="{{ route('recolecciones.create', 'id='.$catastrofe->id) }}" class="btn btn-link">Recolección</a></li>
						    <li><a href="{{ route('eventos.create', 'id='.$catastrofe->id) }}" class="btn btn-link">Evento</a></li>
						    <li><a href="{{ route('voluntariados.create', 'id='.$catastrofe->id) }}" class="btn btn-link">Voluntariado</a></li>

						  </ul>
						</div>

						</td>
						<td>
							<form action="{{ route('catastrofes.destroy', $catastrofe->id) }}" method="POST">

								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-link">Eliminar</button>
							</form>
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

