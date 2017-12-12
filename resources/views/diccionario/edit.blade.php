@extends('layouts.app')
@section('content')
	<div class="col-md-6 col-md-offset-3">
		<h1>Editar Malesyar
		<a href="{{ route('diccionario.index') }}" class="btn btn-success pull-right">Listado</a> 
		</h1>
		@include('diccionario.fragmentos.error')
		{!! Form::model($diccionarios, ['route'=>['diccionario.update',$diccionarios->id],'method'=>'PUT','files' => true ]) !!}
			@include('diccionario.fragmentos.form ')
		{!! Form::close() !!}
	</div>
@endsection