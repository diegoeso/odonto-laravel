@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<h1>Agenda
		<a href="{{ route('agenda.edit', $agendas->id) }}" class="btn btn-success pull-right">Editar</a> 
		</h1>
		<div class="jumbotron">
			@foreach ($pacientes as $paciente)
				@if ($paciente->id==$agendas->id_pasiente)
					<h2>{{ $paciente->nombre .' '.$paciente->apellido_paterno.' '.$paciente->apellido_materno }}</h2>
				@endif
			@endforeach
			
			<p class="lead" style="font-size: 34px">Fecha de Cita: <span style="color:#33A7F2;">{{ $agendas->fecha}}</span></p>
			<p class="lead" style="font-size: 34px">Hora(s): <span style="color:#33A7F2;">{{ $agendas->hora }}</span></p>
		</div>	
	</div>
</div>
@endsection