<div class="form-group">
	{!! Form::label('descripcion', 'Descripcion de la actividad') !!}
	{!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('recaudacion', 'Monto recaudado') !!}
	{!! Form::text('recaudacion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('id_evento', 'toy fondeao') !!}
	{!! Form::hidden('id_evento', $_GET["id"]) !!}
</div>


<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>


