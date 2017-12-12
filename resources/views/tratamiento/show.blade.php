@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<h1>Datos del Tratamiento
		<a href="{{ route('tratamiento.edit', $tratamiento->id) }}" class="btn btn-success pull-right">Editar</a> 
		</h1>
		<div class="jumbotron">
			<h2>{{ $tratamiento->nombre }}</h2>
			<p class="lead">Costo: <span>{{ $tratamiento->costo}}</span></p>
			<p class="lead">Tiempo: <span>{{ $tratamiento->tiempo }}</span></p>
		</div>	
	</div>
</div>
@endsection