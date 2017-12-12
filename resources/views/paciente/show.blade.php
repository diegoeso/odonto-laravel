@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<h1>Datos del Paciente
		<a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-success pull-right">Editar</a> 
		</h1>
		<div class="jumbotron">
			<h2>{{ $paciente->nombre.' '. $paciente->apellido_paterno.' '.$paciente->apellido_materno }}</h2>
			<p class="lead">Fecha de Nacimiento: <span>{{ $paciente->fecha_nacimiento}}</span></p>
			<textarea rows="4" cols="50" class="form-control">
				{{ $paciente->malestares }}
			</textarea>
			<p class="lead">Tratamiento: <span>{{ $paciente->id_tratamiento }}</span></p>
		</div>	
	</div>
</div>
@endsection