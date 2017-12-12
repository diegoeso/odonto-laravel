
<div class="form-group">
	<div class="col-md-12">
		{!! Form::label('nombre','Nombre del Tratamiento') !!}
		{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Tratamiento']) !!}
	</div>
	<div class="col-md-12">
		{!! Form::label('costo','Costo') !!}
		{!! Form::text('costo',null, ['class'=>'form-control', 'placeholder'=>'Costo']) !!}</div>
	<div class="col-md-12">
		{!! Form::label('tiempo','Tiempo del Tratamiento') !!}
		{!! Form::text('tiempo', null, ['class'=>'form-control', 'placeholder'=>'4 años']) !!}
	</div>
</div>

{{-- <div class="form-group">
	<div class="col-md-3">
		{!! Form::label('edad','Edad') !!}
		{!! Form::text('edad', null , ['class'=>'form-control']) !!}
	</div>
	<div class="col-md-3">
		{!! Form::label('serie_de_seguro','Serie de seguro') !!}
		{!! Form::text('serie_de_seguro', null , ['class'=>'form-control']) !!}
	</div>
	<div class="col-md-3">
		{!! Form::label('telefono','Telefono') !!}
		{!! Form::text('telefono', null, ['class'=>'form-control']) !!}
	</div>
	<div class="col-md-3">
		{!! Form::label('numero_asiento','Asiento') !!}
		{!! Form::text('numero_asiento', null, ['class'=>'form-control']) !!}
	</div>
	
</div> --}}
<div class="form-group">
	<div class="col-md-6">
		<br>
		{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}	
	</div>
</div>

