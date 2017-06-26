<div class="form-group">
	{!! Form::label('nombre_medida', 'Nombre de la Medida') !!}
	{!! Form::text('nombre_medida', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('elementos_necesarios', 'Cantidad de elementos necesarios') !!}
	{!! Form::text('elementos_necesarios', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('direccion', 'Direccion de la medida') !!}
	{!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('perfil_voluntario', 'Perfil de los voluntarios') !!}
	{!! Form::text('perfil_voluntario', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('id_catastrofe', 'toy fondeao') !!}
	{!! Form::hidden('id_catastrofe', $_GET["id"]) !!}
</div>


<div class="form-group">
	{!! Form::label('fecha_inicio', 'Fecha de inicio de la Medida  ') !!}
	{!! Form::date('fecha_inicio', null, ['class' => 'form-date']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_termino', 'Fecha de termino de la Medida') !!}
	{!! Form::date('fecha_termino', null, ['class' => 'form-date']) !!}
</div>

<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>
