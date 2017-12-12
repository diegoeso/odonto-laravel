@extends('layouts.app')
@section('content')
		<div class="container">
			<div class="col-md-5 col-md-offset-3">
				<h1>Editar Paciente
				<a href="{{ route('tratamiento.index') }}" class="btn btn-success pull-right">Listado</a> 
				</h1>
				@include('tratamiento.fragmentos.error')
				{!! Form::model($tratamiento, ['route'=>['tratamiento.update',$tratamiento->id],'method'=>'PUT']) !!}
					<div class="form-group">
						<div class="col-md-12">
							{!! Form::label('nombre','Nombre del Tratamiento') !!}
							{!! Form::text('nombre', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-md-12">
							{!! Form::label('costo','Costo') !!}
							{!! Form::text('costo',null, ['class'=>'form-control']) !!}</div>
						<div class="col-md-12">
							{!! Form::label('tiempo','Tiempo del Tratamiento') !!}
							{!! Form::text('tiempo', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="form-group pull-right">
						<div class="col-md-12">
							<div class="hidden-xs hidden-ms">
								<br><br>
							</div>
							{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}	
						</div>
					</div>
			{!! Form::close() !!}	
			</div>
		</div>
@endsection