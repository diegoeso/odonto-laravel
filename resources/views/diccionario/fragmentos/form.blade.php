
<div class="form-group">
	<div class="col-md-12">
		{!! Form::label('malestar','Malestar') !!}
		{!! Form::text('malestar', null, ['class'=>'form-control', 'placeholder'=>'Malestar o molestias']) !!}
	</div>
	<div class="col-md-12">
		{!! Form::label('medicamento','Medicamento') !!}
		{!! Form::textarea('medicamento',null, ['class'=>'form-control', 'placeholder'=>'Medicamento Recetado']) !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-6">
		<br>
		{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}	
	</div>
</div>

