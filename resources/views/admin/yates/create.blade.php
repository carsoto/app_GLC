@extends('layouts.dashboard')
@section('page_heading','Registrar Yate')
@section('section')

<div class="col-lg-12">

    {!! Form::open(array('url' => route('admin.yates.store'), 'files' => true)) !!}
	
		<div class="row">
			<div class="col-md-3">
				<br>{!! Form::label('nombre', "Nombre") !!}
				<br>{!! Form::text('nombre', "", ['class' => 'form-control', 'required']) !!}
				
				<br>{!! Form::label('propietario') !!}
				<br>{!! Form::text('propietario', "", ['class' => 'form-control']) !!}

				<br>{!! Form::label('companias_yate_id', 'Compañía') !!}
				<br>{!! Form::select('companias_yate_id', $companias_yate, null, ['class' => 'form-control']) !!}

				<br>{!! Form::label('modelos_yate_id', 'Modelo') !!}
				<br>{!! Form::select('modelos_yate_id', $modelos, null, ['class' => 'form-control']) !!}

				<br>{!! Form::label('tipos_patente_id', 'Tipo de patente') !!}
				<br>{!! Form::select('tipos_patente_id', $tipos_patente, null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="col-md-3">
				<br>{!! Form::label('anyo_construccion', 'Año de construcción') !!}
				<br>{!! Form::text('anyo_construccion', "", ['class' => 'form-control']) !!}

				<br>{!! Form::label('refit') !!}
				<br>{!! Form::text('refit', "", ['class' => 'form-control']) !!}

				<br>{!! Form::label('loa') !!}
				<br>{!! Form::text('loa', "", ['class' => 'form-control', 'required']) !!}

				<br>{!! Form::label('beam') !!}
				<br>{!! Form::text('beam', "", ['class' => 'form-control', 'required']) !!}

				<br>{!! Form::label('puerto_registro_id', 'Puerto de registro') !!}
				<br>{!! Form::select('puerto_registro_id', $puertos, null, ['class' => 'form-control']) !!}
			</div>

			<div class="col-md-3">
				<br>{!! Form::label('capacidad') !!}
				<br>{!! Form::text('capacidad', "", ['class' => 'form-control', 'required']) !!}
				
				<br>{!! Form::label('nro_tripulantes', 'Tripulantes') !!}
				<br>{!! Form::text('nro_tripulantes', "", ['class' => 'form-control']) !!}
				
				<br>{!! Form::label('velocidad_crucero', 'Velocidad de crucero') !!}
				<br>{!! Form::text('velocidad_crucero', "", ['class' => 'form-control']) !!}

				<br>{!! Form::label('estabilizadores') !!}
				<br>{!! Form::select('estabilizadores', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}
				
				<br>{!! Form::label('ameneties') !!}
				<br>{!! Form::select('ameneties', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}
			</div>

			<div class="col-md-3">
				<br>{!! Form::label('internet') !!}
				<br>{!! Form::select('internet', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

				<br>{!! Form::label('trajes_neopreno', 'Trajes de neopreno (incluido)') !!}
				<br>{!! Form::select('trajes_neopreno', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

				<br>{!! Form::label('equipo_snorkel', 'Equipo de snorkel') !!}
				<br>{!! Form::select('equipo_snorkel', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

				<br>{!! Form::label('kayacks', 'Cant. de kayacks') !!}
				<br>{!! Form::text('kayacks', "", ['class' => 'form-control']) !!}

				<br>{!! Form::label('paddle_boards', 'Cant. de paddle boards') !!}
				<br>{!! Form::text('paddle_boards', "", ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="row">
			<h3>Itinerarios</h3>
			<hr>
			<div class="col-md-2">
				<br>{!! Form::label('paddle_boards', 'Cant. de dias') !!}
				<br>{!! Form::text('paddle_boards', "", ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-4">
				<br>{!! Form::label('paddle_boards', 'Dia de inicio') !!}
				<br>{!! Form::text('paddle_boards', "", ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-4">
				<br>{!! Form::label('paddle_boards', 'Tarifa') !!}
				<br>{!! Form::text('paddle_boards', "", ['class' => 'form-control']) !!}
			</div>
		</div>
		<br><br>
		<div class="row" style="text-align: center;">
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		</div>
		
	
	{!! Form::close() !!}
</div>
@stop

@section('scripts')
<script type="text/javascript">
	
</script>
@stop