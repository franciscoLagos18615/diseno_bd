<div class="form-group">
	{!! Form::label('descripcion', 'Descripcion de la Catastrofe') !!}
	{!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('region', 'Region de la catastrofe') !!}
	{!! Form::text('region', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('comuna', 'Comuna de la Catastrofe') !!}
	{!! Form::text('comuna', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>
