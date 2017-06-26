
<div class="form-group">
	{!! Form::hidden('id_catastrofe',$_GET["id"]) !!}
</div>

<div class="form-group">
	{!! Form::label('nombre_medida', 'Nombre de la Medida') !!}
	{!! Form::text('nombre_medida', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('meta', 'Meta') !!}
	{!! Form::number('meta', 0, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_inicio', 'Fecha de inicio de la Medida  ') !!}
	{!! Form::date('fecha_inicio', null, ['class' => 'form-date']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_termino', 'Fecha de termino de la Medida') !!}
	{!! Form::date('fecha_termino', null, ['class' => 'form-date']) !!}
</div>

<h3>Datos Cuenta: </h3>
<div class="form-group">
	{!! Form::label('numero_cuenta', 'Numero de cuenta') !!}
	{!! Form::number('numero_cuenta', 0, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('banco', 'Nombre del banco') !!}
	{!! Form::text('banco', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tipo_cuenta', 'Tipo de Cuenta') !!}
	{!! Form::number('tipo_cuenta', 0, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('run', 'Run') !!}
	{!! Form::number('run', 0, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>
