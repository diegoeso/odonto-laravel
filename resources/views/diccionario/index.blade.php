@extends('layouts.app')
@section('content')
<div class="container">
   <h2>Diccionario</h2>
		<div class="row">
			<div class="col-md-8">
					{!! Form::open(array('route'=>'diccionario.index', 'method'=>'get' ,'autocomplete'=>'off', 'role'=>'search','class'=>'form-inline'))!!}
						<div class="form-group pull-right">
							<input type="text" placeholder="Malestar" name="busqueda" class="form-control" value="">	
							<input type="submit" value="Buscar" class="btn btn-primary">
						</div>
					{!! Form::close() !!}
				{{-- mensaje de eliminacion --}}
				<div style="padding-top: 40px">
					@include('diccionario.fragmentos.info')	
				</div>
				<table class="table table-hover table-striped table-responsive" id="tblDiccionario">
					<thead>
						<tr>
							<th>ID</th>
							<th>Malestar</th>
							<th>Medicamento</th>
							<th colspan="3">Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($diccionarios as $diccionario)
						<tr>
							<td>{{ $diccionario->id }}</td>
							<td>{{ $diccionario->malestar }}</td>
							<td>{{ $diccionario->medicamento}}</td>
							<td width="20">
								<a href="{{ route('diccionario.show', $diccionario->id) }}" type="button" class="btn btn-primary btn-xs">Ver</a>
							</td>
							<td width="50">
								<a href="{{ route('diccionario.edit', $diccionario->id) }}" class="btn btn-success btn-xs">Editar</a>
							</td>
							<td width="50">
								<form action="{{ route('diccionario.destroy',$diccionario->id) }}" method="post">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<button class="btn btn-danger btn-xs">Eliminar</button>
								</form>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
				{!! $diccionarios->render() !!}
			</div>

			<div class="col-md-4">
				<h2>Nuevo Registro</h2>
				@include('diccionario.fragmentos.error')
				{!! Form::open( ['route'=>'diccionario.store', 'method'=>'POST']) !!}
					@include('diccionario.fragmentos.form')
				{!! Form::close() !!}
			</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('app/diccionario.js') }}"></script>
@endsection
