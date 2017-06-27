<div class="form-group">
	{!! Form::label('run', 'RUN') !!}
	{!! Form::text('run', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('nombre', 'Nombres') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('apellido_paterno', 'Apellido paterno') !!}
	{!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('apellido_materno', 'Apellido materno') !!}
	{!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('id_voluntariado', 'toy fondeao') !!}
	{!! Form::hidden('id_voluntariado', $_GET["id"]) !!}
</div>


<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>


