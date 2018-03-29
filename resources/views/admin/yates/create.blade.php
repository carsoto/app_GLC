@extends('layouts.dashboard')
@section('page_heading','Registrar Yate')
@section('section')

<div class="col-lg-12">

    {!! Form::open(array('url' => route('admin.yates.store'), 'files' => true)) !!}
		<div class="panel-group" id="accordion">
			<div class="panel" id="panel_detalles">
				<div class="panel-heading">
					<h4 class="panel-title"> <a data-toggle="collapse" data-target="#detalles_yate" href="#detalles_yate">Especificaciones técnicas </a></h4>
				</div>
				<div id="detalles_yate" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="col-md-3">
							{!! Form::label('nombre', "Nombre") !!}
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
							{!! Form::label('anyo_construccion', 'Año de construcción') !!}
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
							{!! Form::label('capacidad') !!}
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
							{!! Form::label('internet') !!}
							<br>{!! Form::select('internet', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('trajes_neopreno', 'Trajes de neopreno') !!}
							<br>{!! Form::select('trajes_neopreno', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('equipo_snorkel', 'Equipo de snorkel') !!}
							<br>{!! Form::select('equipo_snorkel', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('kayacks', 'Cant. de kayacks') !!}
							<br>{!! Form::text('kayacks', "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('paddle_boards', 'Cant. de paddle boards') !!}
							<br>{!! Form::text('paddle_boards', "", ['class' => 'form-control']) !!}
						</div>

						<div class="col-lg-12">
							<br>{!! Form::label('deck_plan', 'Planes de cubierta') !!}
							<br>{!! Form::textarea('deck_plan', "", ['class' => 'form-control', 'required', 'size' => '15x15', 'style' => 'resize:none']) !!}
						</div>

						<div class="col-md-6">
							<br>{!! Form::label('incluye', 'Incluye') !!}
							<br>{!! Form::textarea('incluye', "", ['class' => 'form-control', 'required', 'size' => '15x10', 'style' => 'resize:none']) !!}
						</div>
						
						<div class="col-md-6">
							<br>{!! Form::label('ssno_incluye', 'No Incluye') !!}
							<br>{!! Form::textarea('ssno_incluye', "", ['class' => 'form-control', 'required', 'size' => '15x10', 'style' => 'resize:none']) !!}
						</div>
					</div>
				</div>
			</div>

		    <div class="panel" id="panel_itinerarios">
		        <div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalles_itinerarios" href="#detalles_itinerarios" class="collapsed"> Itinerarios </a></h4>
		        </div>
		        <div id="detalles_itinerarios" class="panel-collapse collapse in">
		            <div class="panel-body">
		            	<div class="col-md-4">
							{!! Form::label('it_nombre', 'Nombre') !!}
							<br>{!! Form::text('it_nombre', "", ['class' => 'form-control', 'required']) !!}
						</div>

						<div class="col-md-3">
							{!! Form::label('it_cant_dias', 'Cant. de dias') !!}
							<br>{!! Form::selectRange('it_cant_dias', 4, 15, "", ['class' => 'form-control', 'required']); !!}
						</div>

						<div class="col-md-3">
							{!! Form::label('it_dia_inicio', 'Dia de inicio') !!}
							<br>{!! Form::select('it_dia_inicio', $dias, null, ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-2">
							<br><button type="button" class="btn btn-success btn-circle" name="add_itinerario" id="add_itinerario"><i class="fa fa-plus fa-fw"></i></button>
						</div>

						<br><br><br><br>
						<div id="itinerarios"></div>
						<!-- JAVASCRIPT 
						<div class="panel" id="panel_itinerario_dinamico">
					        <div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalle_itinerario_dinamico" href="#detalle_itinerario_dinamico" class="collapsed"> Itinerario 1 </a> <button type="button" class="btn btn-sm btn-danger" name="remove"><i class="fa fa-minus fa-fw"></i></button></h4>
					        </div>
					        <div id="detalle_itinerario_dinamico" class="panel-collapse collapse">
					            <div class="panel-body">
					            	<div class="col-lg-12">
										<table class="table table-bordered">
											<tbody>
												<tr>
													<td rowspan="2">MON</td>
													<td>am</td>
													<td>{!! Form::text('it_cant_dias', "", ['class' => 'form-control', 'required']) !!}</td>
												</tr>
												<tr>
													<td>pm</td>
													<td>{!! Form::text('it_cant_dias', "", ['class' => 'form-control', 'required']) !!}</td>
												</tr>
												<tr>
													<td rowspan="2">TUE</td>
													<td>am</td>
													<td>{!! Form::text('it_cant_dias', "", ['class' => 'form-control', 'required']) !!}</td>
												</tr>
												<tr>
													<td>pm</td>
													<td>{!! Form::text('it_cant_dias', "", ['class' => 'form-control', 'required']) !!}</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
		            	</div>-->


		            	<!-- /**** RECURSIVIDAD ****/ 
		            	<br>
						<div class="panel" id="panel_itinerario_dinamico">
					        <div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalle_itinerario_dinamico" href="#detalle_itinerario_dinamico" class="collapsed"> Itinerario 1 </a></h4>
					        </div>
					        <div id="detalle_itinerario_dinamico" class="panel-collapse collapse">
					            <div class="panel-body">
					            	<div class="col-lg-12">
										<table class="table table-bordered">
											<tbody>
												<tr>
													<td rowspan="2">MON</td>
													<td>am</td>
													<td>{!! Form::text('it_cant_dias', "", ['class' => 'form-control', 'required']) !!}</td>
												</tr>
												<tr>
													<td>pm</td>
													<td>{!! Form::text('it_cant_dias', "", ['class' => 'form-control', 'required']) !!}</td>
												</tr>
												<tr>
													<td rowspan="2">TUE</td>
													<td>am</td>
													<td>{!! Form::text('it_cant_dias', "", ['class' => 'form-control', 'required']) !!}</td>
												</tr>
												<tr>
													<td>pm</td>
													<td>{!! Form::text('it_cant_dias', "", ['class' => 'form-control', 'required']) !!}</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
		            	</div>-->
		        	</div>
		    	</div>
		    </div>

		    <div class="panel" id="panel_tarifario">
		        <div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalles_tarifario" href="#detalles_tarifario" class="collapsed"> Tarifario </a></h4>
		        </div>
		        <div id="detalles_tarifario" class="panel-collapse collapse">
		            <div class="panel-body">
		            	<div class="col-md-2">
							{!! Form::label('cant_dias', 'Cantidad de días') !!}
							<br>{!! Form::selectRange('cant_dias', 4, 15, "", ['class' => 'form-control']); !!}
						</div>

						<div class="col-md-3">
							{!! Form::label('gross', 'Gross') !!}
							<br>{!! Form::text('gross', "", ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-3">
							{!! Form::label('neto', 'Neto') !!}
							<br>{!! Form::text('neto', "", ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-2">
							{!! Form::label('comision_glc', 'Comisión') !!}
							<br>{!! Form::text('comision_glc', "", ['class' => 'form-control']) !!} 
						</div>
						<div class="col-md-2">
							<br><button type="button" class="btn btn-success btn-circle" name="add"><i class="fa fa-plus fa-fw"></i></button>
							<button type="button" class="btn btn-danger btn-circle" name="remove"><i class="fa fa-minus fa-fw"></i></button>
						</div>
						<div class="col-md-3">
							<br>{!! Form::label('tarfa_temp_alta', 'Tarifa de temporada alta') !!}
							{!! Form::text('tarfa_temp_alta', "", ['class' => 'form-control', 'size' => '4']) !!}
						</div>
						<div class="col-lg-12">
							<br><br>{!! Form::label('fechas_temp_alta', 'Fechas de temporada alta') !!}
							<hr>
						</div>
						<div class="col-md-3">
							{!! Form::label('from', 'Desde') !!} 
							<br>{!! Form::text('from', "", ['class' => 'form-control', 'id' => 'temp_alta_from']) !!}
						</div>

						<div class="col-md-3">
							{!! Form::label('to', 'Hasta') !!}
							<br>{!! Form::text('to', "", ['class' => 'form-control', 'id' => 'temp_alta_to']) !!}
						</div>
						<div class="col-md-2">
							<br><button type="button" class="btn btn-success btn-circle" name="add"><i class="fa fa-plus fa-fw"></i></button>
							<button type="button" class="btn btn-danger btn-circle" name="remove"><i class="fa fa-minus fa-fw"></i></button>
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
							<br>{!! Form::textarea('politicas_pago', "", ['class' => 'form-control', 'required', 'size' => '15x10', 'style' => 'resize:none']) !!}
						</div>

						<div class="col-md-6">
							{!! Form::label('cancelaciones', 'Cancelaciones') !!}
							<br>{!! Form::textarea('cancelaciones', "", ['class' => 'form-control', 'required', 'size' => '15x10', 'style' => 'resize:none']) !!}
						</div>
		            </div>
		        </div>
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
	$( function() {
		var dateFormat = "mm/dd/yy",
		
		temp_alta_from = $("#temp_alta_from").datepicker({
			defaultDate: "+1w",
			changeMonth: true,
		}).on( "change", function() {
			temp_alta_to.datepicker( "option", "minDate", getDate(this));
		}),
		
		temp_alta_to = $( "#temp_alta_to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
		}).on( "change", function() {
			temp_alta_from.datepicker( "option", "maxDate", getDate(this));
		});

		function getDate( element ) {
			var date;
			try {
				date = $.datepicker.parseDate(dateFormat, element.value);
			} catch(error) {
				date = null;
			}
			return date;
		}
	});

	$("#add_itinerario").click(function(){
		var nombre_itinerario = document.getElementById("it_nombre").value.toUpperCase();
		var cant_dias = document.getElementById("it_cant_dias").value;
		var dia_inicio = document.getElementById("it_dia_inicio").value;
		var dias = {!! json_encode($dias) !!};
		var cantd_dias = parseInt(cant_dias) + parseInt(dia_inicio);

		if((nombre_itinerario != "") && (nombre_itinerario != undefined)){
			var itinerario = '<div class="panel" id="panel_itinerario_'+ nombre_itinerario +'"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-target="#detalle_itinerario_'+ nombre_itinerario +'" href="#detalle_itinerario_'+ nombre_itinerario +'" class="collapsed"> '+ nombre_itinerario +' </a> <button type="button" class="btn btn-sm btn-danger" name="remove"><i class="fa fa-minus fa-fw"></i></button></h4></div><div id="detalle_itinerario_'+ nombre_itinerario +'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12"><table class="table table-bordered"><tbody>';
			var cont = 0;

			for (var i = dia_inicio; i <= cantd_dias; i++) {
				if(i > 7){
					i = 1;
					cantd_dias = cantd_dias - cont;
				}else{
					itinerario += '<tr><td rowspan="2">'+ dias[i] +'</td><td>am</td><td><input name=am['+ nombre_itinerario +'][] class="form-control" /></td></tr><tr><td>pm</td><td><input name=pm'+ nombre_itinerario +'][] class="form-control" /></td></tr>';	
				}
				cont++;
			};

			itinerario += '</tbody></table></div></div></div></div>';

			$("#itinerarios").append(itinerario);
		}else {
			alert("Debe escoger un nombre para el itinerario");
		}
		
	});
</script>
@stop