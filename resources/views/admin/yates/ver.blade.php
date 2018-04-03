@extends('layouts.dashboard')
@section('page_heading','Yate')
@section('section')

<div class="col-lg-12">
	<div class="panel-group" id="accordion">
		<div class="panel" id="panel_detalles">
			<div class="panel-heading">
				<h4 class="panel-title"> <a data-toggle="collapse" data-target="#detalles_yate" href="#detalles_yate">Especificaciones técnicas </a></h4>
			</div>
			<div id="detalles_yate" class="panel-collapse collapse in">
				<div class="panel-body">
					<div class="col-md-3">
						{!! Form::label('nombre', "Nombre") !!}
						
						<br>{!! Form::label('propietario') !!}

						<br>{!! Form::label('companias_yate_id', 'Compañía') !!}

						<br>{!! Form::label('modelos_yate_id', 'Modelo') !!}

						<br>{!! Form::label('tipos_patente_id', 'Tipo de patente') !!}
					</div>
					
					<div class="col-md-3">
						{!! Form::label('anyo_construccion', 'Año de construcción') !!}

						<br>{!! Form::label('refit') !!}

						<br>{!! Form::label('loa') !!}

						<br>{!! Form::label('beam') !!}

						<br>{!! Form::label('puerto_registro_id', 'Puerto de registro') !!}
					</div>

					<div class="col-md-3">
						{!! Form::label('capacidad') !!}
						
						<br>{!! Form::label('nro_tripulantes', 'Tripulantes') !!}
						
						<br>{!! Form::label('velocidad_crucero', 'Velocidad de crucero') !!}

						<br>{!! Form::label('estabilizadores') !!}
						
						<br>{!! Form::label('ameneties') !!}
					</div>

					<div class="col-md-3">
						{!! Form::label('internet') !!}

						<br>{!! Form::label('trajes_neopreno', 'Trajes de neopreno') !!}

						<br>{!! Form::label('equipo_snorkel', 'Equipo de snorkel') !!}

						<br>{!! Form::label('kayacks', 'Cant. de kayacks') !!}

						<br>{!! Form::label('paddle_boards', 'Cant. de paddle boards') !!}
					</div>

					<div class="col-lg-12">
						<br>{!! Form::label('deck_plan', 'Planes de cubierta') !!}
					</div>

					<div class="col-md-6">
						<br>{!! Form::label('incluye', 'Incluye') !!}
					</div>
					
					<div class="col-md-6">
						<br>{!! Form::label('no_incluye', 'No Incluye') !!}
					</div>
				</div>
			</div>
		</div>

	    <div class="panel" id="panel_itinerarios">
	        <div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalles_itinerarios" href="#detalles_itinerarios" class="collapsed"> Itinerarios </a></h4>
	        </div>
	        <div id="detalles_itinerarios" class="panel-collapse collapse">
	            <div class="panel-body">
	            	<div class="col-md-4">
						{!! Form::label('it_nombre', 'Nombre') !!}
					</div>

					<div class="col-md-3">
						{!! Form::label('it_cant_dias', 'Cant. de dias') !!}
					</div>

					<div class="col-md-3">
						{!! Form::label('it_dia_inicio', 'Dia de inicio') !!}
					</div>
	        	</div>
	    	</div>
	    </div>

	    <div class="panel" id="panel_tarifario">
	        <div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalles_tarifario" href="#detalles_tarifario" class="collapsed"> Tarifario </a></h4>
	        </div>
	        <div id="detalles_tarifario" class="panel-collapse collapse">
	            <div class="panel-body">
	            	<div class="col-lg-12">
		            	<div class="col-md-3">
							<br>{!! Form::label('tarifa_temp_alta', 'Tarifa de temporada alta') !!}
						</div>
					</div>
					<div class="col-lg-12" id="tarifario_1">
		            	<div class="col-md-2">
							<br>{!! Form::label('cant_dias', 'Cantidad de días') !!}
						</div>

						<div class="col-md-3">
							<br>{!! Form::label('gross', 'Gross') !!}
						</div>

						<div class="col-md-3">
							<br>{!! Form::label('neto', 'Neto') !!}
						</div>

						<div class="col-md-2">
							<br>{!! Form::label('comision_glc', 'Comisión') !!}
						</div>
					</div>
					
					<div id="tarifario"></div>

					<div class="col-lg-12">
						<br><br>{!! Form::label('fechas_temp_alta', 'Fechas de temporada alta') !!}
						<hr>
					</div>

					<div class="row" id="fechas_1">
						<div class="col-lg-12">
							<div class="col-md-3">
								{!! Form::label('from', 'Desde') !!} 
							</div>

							<div class="col-md-3">
								{!! Form::label('to', 'Hasta') !!}
							</div>
						</div>
					</div>
	            </div>

	        </div>
	    </div>

	    <div class="panel" id="panel_politicas">
	        <div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalles_politicas" href="#detalles_politicas" class="collapsed"> Políticas </a></h4>
	        </div>
	        <div id="detalles_politicas" class="panel-collapse collapse">
	            <div class="panel-body">
	            	<div class="col-md-6">
						{!! Form::label('politicas_pago', 'Políticas de pago') !!}
					</div>

					<div class="col-md-6">
						{!! Form::label('cancelaciones', 'Cancelaciones') !!}
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@stop

@section('scripts')


@stop