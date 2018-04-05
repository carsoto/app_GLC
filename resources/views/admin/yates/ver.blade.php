@extends('layouts.dashboard')
@section('page_heading', $yate->nombre)
@section('section')

<div class="col-lg-12">
	<div class="panel-group" id="accordion">
		<div class="panel" id="panel_detalles">
			<div class="panel-heading">
				<h4 class="panel-title"> <a data-toggle="collapse" data-target="#detalles_yate" href="#detalles_yate">Especificaciones técnicas </a></h4>
			</div>
			<div id="detalles_yate" class="panel-collapse collapse in">
				<div class="panel-body">
					<div class="col-md-6">
						<br>{!! Form::label('propietario') !!}: {!! $yate->propietario !!}

						<br>{!! Form::label('companias_yate_id', 'Compañía') !!}: {!! $yate->companias_yate->razon_social !!}

						<br>{!! Form::label('modelos_yate_id', 'Modelo') !!}: {!! $yate->modelos_yate->descripcion !!}

						<br>{!! Form::label('tipos_patente_id', 'Tipo de patente') !!}: {!! $yate->tipos_patente->descripcion !!}

						<br>{!! Form::label('anyo_construccion', 'Año de construcción') !!}: {!! $yate->anyo_construccion !!}

						<br>{!! Form::label('refit') !!}: {!! $yate->refit !!}

						<br>{!! Form::label('draft') !!}: {!! $yate->draft !!}

						<br>{!! Form::label('beam') !!}: {!! $yate->beam !!}

						<br>{!! Form::label('puerto_registro_id', 'Puerto de registro') !!}: {!! $yate->puerto->descripcion !!}

						<br>{!! Form::label('capacidad') !!}: {!! $yate->capacidad !!}
					</div>
					<div class="col-md-6">
						
						<br>{!! Form::label('nro_tripulantes', 'Tripulantes') !!}: {!! $yate->nro_tripulantes !!}
						
						<br>{!! Form::label('velocidad_crucero', 'Velocidad de crucero') !!}: {!! $yate->velocidad_crucero !!}

						<br>{!! Form::label('estabilizadores') !!}: {!! $yate->estabilizadores !!}
						
						<br>{!! Form::label('ameneties') !!}: {!! $yate->ameneties !!}
						
						<br>{!! Form::label('internet') !!}: {!! $yate->internet !!}

						<br>{!! Form::label('trajes_neopreno', 'Trajes de neopreno') !!}: {!! $yate->trajes_neopreno !!}

						<br>{!! Form::label('equipo_snorkel', 'Equipo de snorkel') !!}: {!! $yate->equipo_snorkel !!}

						<br>{!! Form::label('kayacks', 'Cant. de kayacks') !!}: {!! $yate->kayacks !!}

						<br>{!! Form::label('paddle_boards', 'Cant. de paddle boards') !!}: {!! $yate->paddle_boards !!}
					</div>

					<div class="col-lg-12">
						<br>{!! Form::label('deck_plan', 'Planes de cubierta') !!}: {!! $yate->deck_plan !!}
					</div>

					<div class="col-md-6">
						<br>{!! Form::label('incluye', 'Incluye') !!}
						<br>{!! $yate->incluye !!}
					</div>
					
					<div class="col-md-6">
						<br>{!! Form::label('no_incluye', 'No Incluye') !!}
						<br>{!! $yate->no_incluye !!}
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
	        		<!--<table class="table table-condensed table-bordered">
						<tbody>
							@foreach ($yate->itinerarios as $itinerario)
								<tr>
									<td rowspan="2">{!! $itinerario->nombre !!}</td>
									<td rowspan="2">{!! $itinerario->pivot->dia !!}</td>
									<td>am</td>
									<td>{!! $itinerario->pivot->am !!}</td>
								</tr>
								<tr>
									<td>pm</td>
									<td>{!! $itinerario->pivot->pm !!}</td>
								</tr>
							@endforeach
						</tbody>
					</table>-->
	        	</div>
	            <!--<div class="panel-body">
	            	@for ($i = 0; $i < count($yate->itinerarios); $i++)
	            	<br>{{ $yate->itinerarios[$i]->nombre }}

	            	<table class="table table-condensed table-bordered">
						<tbody>
							<tr>
								<td rowspan="2">{!! $yate->itinerarios[$i]->pivot->dia !!}</td>
								<td>am</td>
								<td>{!! $yate->itinerarios[$i]->pivot->am !!}</td>
							</tr>
							<tr>
								<td>pm</td>
								<td>{!! $yate->itinerarios[$i]->pivot->pm !!}</td>
							</tr>
						</tbody>
					</table>
	            	@endfor
	        	</div>-->
	    	</div>
	    </div>

	    <div class="panel" id="panel_tarifario">
	        <div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalles_tarifario" href="#detalles_tarifario" class="collapsed"> Tarifario </a></h4>
	        </div>
	        <div id="detalles_tarifario" class="panel-collapse collapse">
	            <div class="panel-body">
					<div class="row">
						<div class="col col-lg-12">
							{!! Form::label('tarifa_temp_alta', 'Tarifa de temporada alta') !!}: {!! $yate->tarifa_temp_alta !!}
							
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
									@for ($i = 0; $i < count($yate->tarifarios); $i++)
										<tr>
											<td>{!! $yate->tarifarios[$i]->cant_dias !!}</td>
											<td>{{ number_format($yate->tarifarios[$i]->gross) }} $</td>
											<td>{{ number_format($yate->tarifarios[$i]->neto) }} $</td>
											<td>{{ number_format($yate->tarifarios[$i]->comision_glc) }} $</td>
										</tr>
									@endfor
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div class="col col-lg-12">
							{!! Form::label('fechas_temp_alta', 'Fechas de temporada alta') !!}
							
							<table class="table table-condensed">
								<thead>
									<tr>
										<th>{!! Form::label('from', 'Desde') !!}</th>
										<th>{!! Form::label('to', 'Hasta') !!}</th>
									</tr>
								</thead>
								<tbody>
									@for ($i = 0; $i < count($yate->temporadas_altas); $i++)
										<tr>
											<td>{{ \Carbon\Carbon::parse($yate->temporadas_altas[$i]->desde)->format('d/m/Y') }}</td>
											<td>{{ \Carbon\Carbon::parse($yate->temporadas_altas[$i]->hasta)->format('d/m/Y') }}</td>
										</tr>
									@endfor
								</tbody>
							</table>
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
						<br>{!! $yate->politicas_pago !!}
					</div>

					<div class="col-md-6">
						{!! Form::label('cancelaciones', 'Cancelaciones') !!}
						<br>{!! $yate->cancelaciones !!}
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@stop

@section('scripts')

@stop