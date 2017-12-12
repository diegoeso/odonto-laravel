@extends('layouts.app')

@section('content')
<div class="container">
   <h2>Agenda {{-- <a href="{{ route('agenda.create') }}" class="btn btn-primary pull-right">Nuevo</a> --}}</h2>
		<div class="row">
			<div class="col-md-8">
					{!! Form::open(array('route'=>'agenda.index', 'method'=>'get' ,'autocomplete'=>'off', 'role'=>'search','class'=>'form-inline'))!!}
						<div class="form-group pull-right">
							<input type="date" placeholder="Malestar" name="busqueda" class="form-control" value="">	
							<input type="submit" value="Buscar" class="btn btn-primary">
						</div>
					{!! Form::close() !!}
				{{-- mensaje de eliminacion --}}
				<div style="padding-top: 40px">
					@include('agenda.fragmentos.info')	
				</div>
				<table class="table table-hover table-striped table-responsive" id="myTable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Paciente</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th colspan="3">Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($agendas as $agenda)
							<tr>
								<td>{{ $agenda->id}}</td>
								@foreach ($pacientes as $paciente)
									@if ($paciente->id==$agenda->id_pasiente)
										<td>{{ $paciente->nombre}}</td>		
									@endif								
								@endforeach
								<td>{{ $agenda->fecha}}</td>
								<td>{{ $agenda->hora}}</td>
								<td width="20">
									<a href="{{ route('agenda.show', $agenda->id) }}" type="button" class="btn btn-primary btn-xs">Ver</a>
								</td>
								<td width="50">
									<a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-success btn-xs">Editar</a>
								</td>
								<td width="50">
									<form action="{{ route('agenda.destroy',$agenda->id) }}" method="post">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<button class="btn btn-danger btn-xs">Eliminar</button>
								</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $agendas->render() !!}
			</div>
			<div class="col-md-4">
				<h3>Nuevo Registro</h3>
				@include('agenda.fragmentos.error')
				{!! Form::open( ['route'=>'agenda.store', 'method'=>'POST']) !!}
					<div class="form-group">
						<div class="col-md-12">
							{!! Form::label('nombre','Paciente') !!}
							<select name="id_pasiente" id="id_pasiente" class="form-control">
								<option value="">--Seleccione un paciente--</option>
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
	</div>
</div>
@endsection