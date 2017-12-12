@extends('layouts.app')
@section('content')
		<div class="col-md-4 col-md-offset-4">
				<h3>Editar Registro</h3>
				@include('agenda.fragmentos.error')
				{!! Form::model($agendas, ['route'=>['agenda.update',$agendas->id],'method'=>'PUT']) !!}
					<div class="form-group">
						<div class="col-md-12">
							{!! Form::label('nombre','Paciente') !!}
							<br>
							<select name="id_pasiente" id="id_pasiente" class="form-control">
								@foreach ($pacientes as $paciente)
									@if ($agendas->id_pasiente==$paciente->id)
											<option value="{{ $agendas->id_pasiente}}">{{ $paciente->nombre }}</option>
									@endif	
								@endforeach
								@foreach ($pacientes as $paciente)
									<option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
								 @endforeach
							</select>
						</div>
						<div class="col-md-12">
							{!! Form::label('fecha','Fecha') !!}
							{!! Form::date('fecha',null, ['class'=>'form-control','placeholder'=>'Fecha']) !!}</div>
						<div class="col-md-12">
							{!! Form::label('hora','Hora') !!}
							{!! Form::time('hora', null, ['class'=>'form-control','placeholder'=>'Hora']) !!}
						</div>
					</div>
					<div class="form-group pull-right">
						<div class="col-md-12">
							<div class="hidden-xs hidden-ms">
								<br>
							</div>
								{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}	
						</div>
					</div>
				{!! Form::close() !!}
			</div>
@endsection