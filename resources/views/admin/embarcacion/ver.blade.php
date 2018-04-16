@extends('layouts.dashboard')
@section('page_heading', $embarcacion->nombre)
@section('section')

<div class="col-lg-12">
	<div class="panel-group" id="accordion">
		<div class="panel" id="panel_detalles_generales">
			<div class="panel-heading">
				<h4 class="panel-title"> <a data-toggle="collapse" data-target="#detalles_generales" href="#detalles_generales" class="collapsed">Información General</a></h4>
			</div>
			<div id="detalles_generales" class="panel-collapse collapse">
				<div class="panel-body">
					{!! Form::label('anyo_construccion', 'Año de construcción') !!}: {!! $embarcacion->anyo_construccion !!}
					<br>{!! Form::label('refit') !!}: {!! $embarcacion->refit !!}
					<br>{!! Form::label('puerto_registro_id', 'Puerto de registro') !!}: {!! $embarcacion->puerto->descripcion !!}
					<br>{!! Form::label('companias_embarcacion_id', 'Operador / Propietario') !!}: {!! $embarcacion->companias_embarcacion->razon_social !!}
					<br>{!! Form::label('modelos_embarcacion_id', 'Modelo') !!}: {!! $embarcacion->modelos_embarcacion->descripcion !!}
					<br>{!! Form::label('tipos_patente_id', 'Tipo de patente') !!}: {!! $embarcacion->tipos_patente->descripcion !!}
				</div>
			</div>
		</div>
		
		<div class="panel" id="panel_detalles_tecnicos">
			<div class="panel-heading">
				<h4 class="panel-title"> <a data-toggle="collapse" data-target="#detalles_tecnicos" href="#detalles_tecnicos" class="collapsed">Especificaciones técnicas </a></h4>
			</div>
			<div id="detalles_tecnicos" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="col-md-4">
						{!! Form::label('capacidad') !!}: {!! $embarcacion->capacidad !!}
						<br>{!! Form::label('eslora') !!}: {!! $embarcacion->eslora !!}
						<br>{!! Form::label('manga') !!}: {!! $embarcacion->manga !!}
						<br>{!! Form::label('puntal') !!}: {!! $embarcacion->puntal !!}
						<br>{!! Form::label('velocidad_crucero', 'Velocidad de crucero') !!}: {!! $embarcacion->velocidad_crucero !!}
					</div>

					<div class="col-md-4">
						{!! Form::label('nro_tripulantes', 'Tripulantes') !!}: {!! $embarcacion->nro_tripulantes !!}
						<br>{!! Form::label('estabilizadores') !!}: {!! $embarcacion->estabilizadores !!}
						<br>{!! Form::label('ameneties') !!}: {!! $embarcacion->ameneties !!}
						<br>{!! Form::label('internet') !!}: {!! $embarcacion->internet !!}
					</div>

					<div class="col-md-4">
						{!! Form::label('trajes_neopreno', 'Trajes de neopreno') !!}: {!! $embarcacion->trajes_neopreno !!}
						<br>{!! Form::label('equipo_snorkel', 'Equipo de snorkel') !!}: {!! $embarcacion->equipo_snorkel !!}
						<br>{!! Form::label('kayacks', 'Cant. de kayacks') !!}: {!! $embarcacion->kayacks !!}
						<br>{!! Form::label('paddle_boards', 'Cant. de paddle boards') !!}: {!! $embarcacion->paddle_boards !!}
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
	            	@foreach ($itinerarios AS $key => $value)
	        			<table class="table table-condensed table-bordered">
	        				<thead>
	        					<tr>
	        						<th colspan="3">{!! $key !!}</th>
	        					</tr>
	        				</thead>
							<tbody>
								@for ($i = 0; $i < count($value); $i++)
				        			<tr>
										<td rowspan="2">{!! $dias[$value[$i]['dia']] !!}</td>
										<td>am</td>
										<td>{!! $value[$i]['am'] !!}</td>
									</tr>
									<tr>
										<td>pm</td>
										<td>{!! $value[$i]['pm'] !!}</td>
									</tr>
			        			@endfor
			        		</tbody>
						</table>
	        		@endforeach
	        	</div>
	    	</div>
	    </div>

	    <div class="panel" id="panel_tarifario">
	        <div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalles_tarifario" href="#detalles_tarifario" class="collapsed"> Tarifario </a></h4>
	        </div>
	        <div id="detalles_tarifario" class="panel-collapse collapse">
	            <div class="panel-body">
	            	<table class="table table-condensed">
						<thead>
							<tr>
								<th>{!! Form::label('cant_dias', 'Cantidad de días') !!}</th>
								<th>{!! Form::label('gross', 'Gross') !!}</th>
								<th>{!! Form::label('neto', 'Neto') !!}</th>
								<th>{!! Form::label('comision_glc', 'Comisión') !!}</th>
							</tr>
						</thead>
						<tbody>
							@for ($i = 0; $i < count($embarcacion->tarifarios); $i++)
								<tr>
									<td>{!! $embarcacion->tarifarios[$i]->cant_dias !!}</td>
									<td>{{ number_format($embarcacion->tarifarios[$i]->gross) }} $</td>
									<td>{{ number_format($embarcacion->tarifarios[$i]->neto) }} $</td>
									<td>{{ number_format($embarcacion->tarifarios[$i]->comision_glc) }} $</td>
								</tr>
							@endfor
						</tbody>
					</table>

					{!! Form::label('tarifa_temp_alta', 'Tarifas de temporada alta') !!}
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>{!! Form::label('desde', 'Inicia') !!}</th>
								<th>{!! Form::label('hasta', 'Finaliza') !!}</th>
								<th>{!! Form::label('cant_dias', 'Cantidad de días') !!}</th>
								<th>{!! Form::label('gross', 'Gross') !!}</th>
								<th>{!! Form::label('neto', 'Neto') !!}</th>
								<th>{!! Form::label('comision_glc', 'Comisión') !!}</th>
							</tr>
						</thead>
						<tbody>
							@for ($j = 0; $j < count($embarcacion->temporadas_altas); $j++)
								<tr>
									<td>{!! $embarcacion->temporadas_altas[$j]->desde !!}</td>
									<td>{!! $embarcacion->temporadas_altas[$j]->hasta !!}</td>
									<td>{!! $embarcacion->temporadas_altas[$j]->cant_dias !!}</td>
									<td>{{ number_format($embarcacion->temporadas_altas[$j]->gross) }} $</td>
									<td>{{ number_format($embarcacion->temporadas_altas[$j]->neto) }} $</td>
									<td>{{ number_format($embarcacion->temporadas_altas[$j]->comision_glc) }} $</td>
								</tr>
							@endfor
						</tbody>
					</table>
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
						<br>{!! $embarcacion->politicas_pago !!}
					</div>

					<div class="col-md-6">
						{!! Form::label('cancelaciones', 'Cancelaciones') !!}
						<br>{!! $embarcacion->cancelaciones !!}
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@stop

@section('scripts')

@stop