@extends('layouts.app')

@section('content')
<div class="container">
   <h2>Listado de Pacientes <a href="{{ route('paciente.create') }}" class="btn btn-primary pull-right">Nuevo</a></h2>
		<div class="row">
			<div class="col-md-12">
					{!! Form::open(array('route'=>'paciente.index', 'method'=>'get' ,'autocomplete'=>'off', 'role'=>'search','class'=>'form-inline'))!!}
						<div class="form-group pull-right">
							<input type="text" placeholder="Nombre del Paciente" name="busqueda" class="form-control" value="">	
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
							<th>Nombre</th>
							<th>Fecha de Nacimiento</th>
							{{-- <th>Malestar</th> --}}
							<th>Tratamiento</th>
							<th colspan="3">Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pacientes as $paciente)
						<tr>
							<td>{{ $paciente->id}}</td>
							<td>{{ $paciente->nombre.' '.$paciente->apellido_paterno.' '. $paciente->apellido_materno}}</td>
							<td>{{$paciente->fecha_nacimiento }}</td>
							@foreach ($tratamientos as $tratamiento)
								@if ($tratamiento->id==$paciente->id_tratamiento)
									<td>{{$tratamiento->nombre}}</td>		
								@endif
							@endforeach
							<td width="20">
								<a href="{{ route('paciente.show', $paciente->id) }}" type="button" class="btn btn-primary btn-xs">Ver</a>
							</td>
							<td width="50">
								<a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-success btn-xs">Editar</a>
							</td>
							<td width="50">
								<form action="{{ route('paciente.destroy',$paciente->id) }}" method="post">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<button class="btn btn-danger btn-xs">Eliminar</button>
								</form>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
				{!! $pacientes->render() !!}
			</div>

		{{-- 	<div class="col-md-4">
				<h2>Nuevo Registro
				<a href="{{ route('tratamiento.index') }}" class="btn btn-success pull-right">Listado</a> 
				</h2>
				@include('tratamiento.fragmentos.error')
				{!! Form::open( ['route'=>'tratamiento.store', 'method'=>'POST','files' => true ]) !!}
					@include('tratamiento.fragmentos.form')
				{!! Form::close() !!}
			</div> --}}
		{{-- 	<div class="col-md-4">
				@include('tratamiento.fragmentos.aside')
			</div> --}}
	</div>
</div>
@endsection
