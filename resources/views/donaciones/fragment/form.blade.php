<div class="container">
<h3>Datos personales</h3>	
<div class="row">
	
<div class="col-xs-12">
<div class="form-group">
	{!! Form::label('nombre', 'Nombre: ') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>
</div>
</div>


<div class="row">
	
<div class="col-xs-12">
<div class="col-xs-6">
	<div class="form-group">
		{!! Form::label('apellido_paterno', 'Apellido Paterno: ') !!}
		{!! Form::text('apellito_paterno', null, ['class' => 'form-control']) !!}
	</div>		
</div>	
<div class="col-xs-6">
	{!! Form::label('apellido_materno', 'Apellido Materno: ') !!}
	{!! Form::text('apellito_materno', null, ['class' => 'form-control']) !!}
</div>
</div>

</div>

<div class="row">
	
<div class="col-xs-12">
	<div class="col-xs-6 ">	
		<div class="form-group">
				{!! Form::label('monto', 'Dinero a donar: ') !!}
				{!! Form::number('monto', null, ['class' => 'form-control']) !!}
		</div>
	</div>	

<div class="col xs-3 col-xs-offset-3">
		
<div class="form-group">
	{!! Form:: hidden('id_apoyo_economico',$_GET["id"] )!!}
</div>
<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>

</div>
</div>
