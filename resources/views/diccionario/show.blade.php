@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<h1>Datos del Malestar
		<a href="{{ route('diccionario.edit', $diccionarios->id) }}" class="btn btn-success pull-right">Editar</a> 
		</h1>
		<div class="jumbotron">
			<h2>Malestar: {{ $diccionarios->malestar }}</h2>
			<p class="lead">Medicamento: <span style="color:#33A7F2;">{{ $diccionarios->medicamento}}</span></p>
		</div>	
	</div>
</div>
@endsection