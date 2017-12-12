{{-- 
<div class="form-group">
	<div class="col-md-4">
		{!! Form::label('nombre','Nombre') !!}
		{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
	</div>
	<div class="col-md-4">
		{!! Form::label('apellido_paterno','Apellido Paterno') !!}
		{!! Form::text('apellido_paterno',null, ['class'=>'form-control','placeholder'=>'Apellido Paterno']) !!}</div>
	<div class="col-md-4">
		{!! Form::label('apellido_materno','Apellido Materno') !!}
		{!! Form::text('apellido_materno', null, ['class'=>'form-control','placeholder'=>'Apellido Materno']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-3">
		{!! Form::label('fecha_nacimiento','Fecha de Nacimiento') !!}
		{!! Form::date('fecha_nacimiento', null , ['class'=>'form-control']) !!}
	</div>
	<div class="col-md-6">
		{!! Form::label('malestares','Malestares') !!}
		{!! Form::textarea('malestares', null , ['class'=>'form-control','size' => '30x5','placeholder'=>'Sintomas']) !!}
	</div>	
	<div class="col-md-3">
		{!! Form::label('id_tratamiento','Tratamiento') !!}
		@foreach ($tratamientos as $tratamiento)
			{!! Form::select('id_tratamiento', $tratamientos->id, $tratamientos->nombre) !!}
		@endforeach
	</div>	
</div>
<div class="form-group pull-right">
	<div class="col-md-12">
		<div class="hidden-xs hidden-ms">
			<br><br><br><br><br><br>
		</div>
		{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}	
	</div>
</div>
 --}}