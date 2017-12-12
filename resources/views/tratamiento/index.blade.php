@extends('layouts.app')

@section('content')
<div class="container">
   <h2>Listado de Tratamientos</h2>
		<div class="row">
			<div class="col-md-8">
					{!! Form::open(array('route'=>'tratamiento.index', 'method'=>'get' ,'autocomplete'=>'off', 'role'=>'search','class'=>'form-inline'))!!}
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
							<th>Costo</th>
							<th>Tiempo</th>
							<th colspan="3">Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tratamientos as $tratamiento)
						<tr>
							<td>{{ $tratamiento->id }}</td>
							<td>{{ $tratamiento->nombre }}</td>
							<td>{{ $tratamiento->costo}}</td>
							<td>{{ $tratamiento->tiempo }}</td>
							
							<td width="20">
								<a href="{{ route('tratamiento.show', $tratamiento->id) }}" type="button" class="btn btn-primary btn-xs">Ver</a>
							</td>
							<td width="50">
								<a href="{{ route('tratamiento.edit', $tratamiento->id) }}" class="btn btn-success btn-xs">Editar</a>
							</td>
							<td width="50">
								<form action="{{ route('tratamiento.destroy',$tratamiento->id) }}" method="post">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<button class="btn btn-danger btn-xs">Eliminar</button>
								</form>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
				{!! $tratamientos->render() !!}
			</div>

			<div class="col-md-4">
				<h2>Nuevo Registro
				{{-- <a href="{{ route('tratamiento.index') }}" class="btn btn-success pull-right">Listado</a>  --}}
				</h2>
				@include('tratamiento.fragmentos.error')
				{!! Form::open( ['route'=>'tratamiento.store', 'method'=>'POST','files' => true ]) !!}
					@include('tratamiento.fragmentos.form')
				{!! Form::close() !!}
			</div>
		{{-- 	<div class="col-md-4">
				@include('tratamiento.fragmentos.aside')
			</div> --}}
	</div>
</div>
@endsection
