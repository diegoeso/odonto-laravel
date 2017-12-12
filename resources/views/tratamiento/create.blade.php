@extends('layouts.app')
@section('content')
		<div class="container">
			<h1>Nuevo Registro
			<a href="{{ route('tratamiento.index') }}" class="btn btn-success pull-right">Listado</a> 
			</h1>

			@include('tratamiento.fragmentos.error')
			{!! Form::open( ['route'=>'tratamiento.store', 'method'=>'POST']) !!}
				@include('tratamiento.fragmentos.form')
			{!! Form::close() !!}
		</div>
@endsection