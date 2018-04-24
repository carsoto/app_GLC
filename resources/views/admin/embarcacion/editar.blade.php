@extends('layouts.dashboard')
@section('page_heading', $embarcacion->nombre)
@section('section')

<div class="col-lg-12">

    {!! Form::open(array('url' => route('admin.embarcacion.update'), 'files' => true, 'id' => 'editar_embarcacion_form')) !!}
		
		{{ csrf_field() }}

		<div class="panel-group" id="accordion">
			<div class="panel" id="panel_detalles_generales">
				<div class="alert alert-danger alert-dismissible" role="alert" id="div_detalles_generales_error" hidden>
					<button type="button" class="close" onclick="$('#div_detalles_generales_error').hide();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Warning!</strong> <span id="detalles_generales_error"></span>
				</div>
				<div class="panel-heading">
					<h4 class="panel-title"> <a data-toggle="collapse" data-target="#detalles_generales" href="#detalles_generales" class="collapsed">Información general <span id="detalles_generales_falta_info" style="color: red;"></span></a></h4>
				</div>
				<div id="detalles_generales" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="col-md-6">
							{!! Form::hidden('id_embarcacion', $embarcacion->id, ['class' => 'form-control']) !!}

							<br>{!! Form::label('nombre', "Nombre*") !!}
							<br>{!! Form::text('nombre', $embarcacion->nombre, ['class' => 'form-control detalles_generales_fields', 'id' => 'nombre_embarcacion', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('anyo_construccion', 'Año de construcción') !!}
							<br>{!! Form::text('anyo_construccion', $embarcacion->anyo_construccion, ['class' => 'form-control detalles_generales_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('refit') !!}
							<br>{!! Form::text('refit', $embarcacion->refit, ['class' => 'form-control detalles_generales_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('puerto_registro_id', 'Puerto de registro*') !!}
							<br>{!! Form::select('puerto_registro_id', $puertos, $embarcacion->puerto->id, ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-6">
							<br>{!! Form::label('tipo_embarcacion_id', 'Tipo*') !!}
							<br>{!! Form::select('tipo_embarcacion_id', $tipos_embarcacion, $embarcacion->modelos_embarcacion->tipos_embarcacion->id, ['class' => 'form-control', 'id' => 'tipo_embarcacion']) !!}

							<br>{!! Form::label('modelos_embarcacion_id', 'Modelo') !!}
							<br>{!! Form::select('modelos_embarcacion_id', $modelos, $embarcacion->modelos_embarcacion->id, ['class' => 'form-control', 'id' => 'modelos_embarcacion']) !!}

							<br>{!! Form::label('companias_embarcacion_id', 'Operador / Propietario*') !!}
							<br>{!! Form::select('companias_embarcacion_id', $companias_embarcacion, $embarcacion->companias_embarcacion->id, ['class' => 'form-control']) !!}

							<br>{!! Form::label('tipos_patente_id', 'Tipo de patente*') !!}
							<br>{!! Form::select('tipos_patente_id', $tipos_patente, $embarcacion->tipos_patente->id, ['class' => 'form-control', 'id' => 'tipos_patente']) !!}
						</div>

						<div class="col-md-12">
			                <br>{!! Form::label('planos_cubierta', 'Planos de cubierta') !!}
			                <ul class="list-inline gallery">    
								<li><img id="planos_cubierta_img" class="img-responsive thumbnail zoom" src="{{URL::asset('images/'.$embarcacion->nombre.'/'.$embarcacion->planos_cubierta)}}" alt="Planos de cubierta" height="250" width="250"></li>
							</ul>
			                <br>{!! Form::file('planos_cubierta', ['class' => 'form-control', 'id' => 'cambiar_im_planos_cubierta', 'accept' => 'image/*']) !!}
		            	</div>
						
						<div class="col-md-12">
			                <br>{!! Form::label('imagen_general', 'Imagen general') !!}
							<ul class="list-inline gallery">    
								<li><img id="imagen_gral_img" class="img-responsive thumbnail zoom" src="{{URL::asset('images/'.$embarcacion->nombre.'/'.$embarcacion->imagen_general)}}" alt="Planos de cubierta" height="250" width="250"></li>
							</ul>
			                <br>{!! Form::file('imagen_general', ['class' => 'form-control', 'id' => 'cambiar_im_gral', 'accept' => 'image/*']) !!}
		            	</div>
					</div>
				</div>
			</div>

			<div class="panel" id="panel_detalles_tecnicos">
				<div class="panel-heading">
					<h4 class="panel-title"> <a data-toggle="collapse" data-target="#detalles_tecnicos" href="#detalles_tecnicos" class="collapsed">Especificaciones técnicas <span id="detalles_tecnicos_falta_info" style="color: red;"></span></a></h4>
				</div>
				<div id="detalles_tecnicos" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="col-md-4">
							{!! Form::label('capacidad') !!}
							<br>{!! Form::text('capacidad', $embarcacion->capacidad, ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('eslora') !!}
							<br>{!! Form::text('eslora', $embarcacion->eslora, ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('manga') !!}
							<br>{!! Form::text('manga', $embarcacion->manga, ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
							
							<br>{!! Form::label('puntal') !!}
							<br>{!! Form::text('puntal', $embarcacion->puntal, ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
							
							<br>{!! Form::label('velocidad_crucero', 'Velocidad de crucero') !!}
							<br>{!! Form::text('velocidad_crucero', $embarcacion->velocidad_crucero, ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
						</div>

						<div class="col-md-4">
							{!! Form::label('nro_tripulantes', 'Cant. de Tripulantes') !!}
							<br>{!! Form::text('nro_tripulantes', $embarcacion->nro_tripulantes, ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('estabilizadores') !!}
							<br>{!! Form::select('estabilizadores', array('Si' => 'Si', 'No' => 'No'), $embarcacion->estabilizadores, ['class' => 'form-control']) !!}

							<br>{!! Form::label('internet') !!}
							<br>{!! Form::select('internet', array('Si' => 'Si', 'No' => 'No'), $embarcacion->internet, ['class' => 'form-control']) !!}

							<br>{!! Form::label('kayacks', 'Cant. de kayacks') !!}
							<br>{!! Form::text('kayacks', $embarcacion->kayacks, ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
						</div>
						
						<div class="col-md-4">
							{!! Form::label('paddle_boards', 'Cant. de paddle boards') !!}
							<br>{!! Form::text('paddle_boards', $embarcacion->paddle_boards, ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('trajes_neopreno', 'Trajes de neopreno') !!}
							<br>{!! Form::select('trajes_neopreno', array('Si' => 'Si', 'No' => 'No'), $embarcacion->trajes_neopreno, ['class' => 'form-control']) !!}

							<br>{!! Form::label('equipo_snorkel', 'Equipo de snorkel') !!}
							<br>{!! Form::select('equipo_snorkel', array('Si' => 'Si', 'No' => 'No'), $embarcacion->equipo_snorkel, ['class' => 'form-control']) !!}

							<br>{!! Form::label('ameneties') !!}
							<br>{!! Form::select('ameneties', array('Si' => 'Si', 'No' => 'No'), $embarcacion->ameneties, ['class' => 'form-control']) !!}
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
							<br>{!! Form::text('it_nombre', "", ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-3">
							{!! Form::label('it_cant_dias', 'Cant. de dias') !!}
							<br>{!! Form::selectRange('it_cant_dias', 4, 15, "", ['class' => 'form-control']); !!}
						</div>

						<div class="col-md-3">
							{!! Form::label('it_dia_inicio', 'Dia de inicio') !!}
							<br>{!! Form::select('it_dia_inicio', $dias, null, ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-2">
							<br><button type="button" class="btn btn-success btn-circle" name="add_itinerario" id="add_itinerario"><i class="fa fa-plus fa-fw"></i></button>
						</div>

						<br><br><br><br>
						<div id="itinerarios">
							@foreach ($itinerarios AS $key => $value)
								<div class="panel" id="panel_itinerario_{!! $key !!}">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-target="#detalle_itinerario_{!! $key !!}" href="#detalle_itinerario_{!! $key !!}" class="collapsed">{!! $key !!}</a> <button type="button" class="btn btn-sm btn-danger remove_itinerario" name="remove" onclick="remove_elemento(panel_itinerario_{!! $key !!}, null)"><i class="fa fa-minus fa-fw"></i></button>
										</h4>
									</div>
									<div id="detalle_itinerario_{!! $key !!}" class="panel-collapse collapse">
										<div class="panel-body">
											<div class="col-lg-12">
												<ul class="list-inline gallery">    
													<li><img id="imagen_it_{{$key}}" class="img-responsive thumbnail zoom" src="{{URL::asset('images/'.$embarcacion->nombre.'/'.$itinerarios[$key][0]['imagen'])}}" alt="Planos de cubierta" height="300" width="350"></li>
												</ul>
												{!! Form::label('cambiar_im_it', 'Cambiar imagen del itinerario') !!}
												{!! Form::file('imagen_itinerario['.$key.']', ['class' => 'form-control', 'accept' => 'image/*', 'onchange' => 'javascript:readURL(this, \'imagen_it_'.$key.'\');']) !!}
												<table class="table table-bordered">
													<tbody>
														@for ($i = 0; $i < count($value); $i++)
															<tr>
																<td rowspan="2">
																	{!! $dias[$value[$i]['dia']] !!} 
																	{{ Form::hidden('dias['.$key.'][]', $value[$i]['dia']) }}
																</td>
																<td>am</td>
																<td>{!! Form::select('am['.$key.'][]', $sitios_turisticos, $value[$i]['am'], ['class' => 'form-control']) !!}</td>
															</tr>
															<tr>
																<td>pm</td>
																<td>{!! Form::select('pm['.$key.'][]', $sitios_turisticos, $value[$i]['pm'], ['class' => 'form-control']) !!}</td>
															</tr>
														@endfor
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
			        		@endforeach
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
						<div id="tarifario">
							@for ($i = 0; $i < count($embarcacion->tarifarios); $i++)
								<div class="col-lg-12" id="tarifario_{{ $i }}">
					            	<div class="col-md-2">
										<br>{!! Form::label('cant_dias', 'Cantidad de días') !!}
										<br>{!! Form::selectRange('cant_dias[]', 4, 15, $embarcacion->tarifarios[$i]->cant_dias, ['class' => 'form-control']); !!}
									</div>

									<div class="col-md-3">
										<br>{!! Form::label('gross', 'Gross') !!}
										<br>{!! Form::text('gross[]', number_format($embarcacion->tarifarios[$i]->gross), ['class' => 'form-control']) !!}
									</div>

									<div class="col-md-3">
										<br>{!! Form::label('neto', 'Neto') !!}
										<br>{!! Form::text('neto[]', number_format($embarcacion->tarifarios[$i]->neto), ['class' => 'form-control']) !!}
									</div>

									<div class="col-md-2">
										<br>{!! Form::label('comision_glc', 'Comisión') !!}
										<br>{!! Form::text('comision_glc[]', number_format($embarcacion->tarifarios[$i]->comision_glc), ['class' => 'form-control']) !!} 
									</div>
									<div class="col-md-2">
										<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_tarifa()"><i class="fa fa-plus fa-fw"></i></button>
										<button type="button" class="btn btn-danger btn-circle remove_tarifa" name="remove" onclick="remove_elemento(tarifario_{{ $i }}, 'remove_tarifa')"><i class="fa fa-minus fa-fw"></i></button>
									</div>
								</div>
							@endfor
						</div>

						<div class="col-lg-12">
							<br><br>{!! Form::label('fechas_temp_alta', 'Fechas de temporada alta') !!}
							<hr>
						</div>
						<div id="fechas_temp_alta">
							@if(count($embarcacion->temporadas_altas) > 1)
								@for ($j = 0; $j < count($embarcacion->temporadas_altas); $j++)
									<div class="row" id="fechas_{{ $j }}">
										<div class="col-lg-12">
											<div class="col-md-6">
												{!! Form::label('from', 'Desde') !!} 
												<br>{!! Form::text('temp_alta_from[]', $embarcacion->temporadas_altas[$j]->desde, ['class' => 'form-control temp_alta_from', 'id' => 'from_1']) !!}
											</div>

											<div class="col-md-6">
												{!! Form::label('to', 'Hasta') !!}
												<br>{!! Form::text('temp_alta_to[]', $embarcacion->temporadas_altas[$j]->hasta, ['class' => 'form-control temp_alta_to', 'id' => 'to_1']) !!}
											</div>
										</div>
										<div class="col-lg-12">
											<div class="col-md-2">
												<br>{!! Form::label('cant_dias', 'Cantidad de días') !!}
												<br>{!! Form::selectRange('temp_alta_cant_dias[]', 4, 15, $embarcacion->temporadas_altas[$j]->cant_dias, ['class' => 'form-control']); !!}
											</div>

											<div class="col-md-3">
												<br>{!! Form::label('gross', 'Gross') !!}
												<br>{!! Form::text('temp_alta_gross[]', number_format($embarcacion->temporadas_altas[$j]->gross), ['class' => 'form-control']) !!}
											</div>

											<div class="col-md-3">
												<br>{!! Form::label('neto', 'Neto') !!}
												<br>{!! Form::text('temp_alta_neto[]', number_format($embarcacion->temporadas_altas[$j]->neto), ['class' => 'form-control']) !!}
											</div>

											<div class="col-md-2">
												<br>{!! Form::label('comision_glc', 'Comisión') !!}
												<br>{!! Form::text('temp_alta_comision_glc[]', number_format($embarcacion->temporadas_altas[$j]->comision_glc), ['class' => 'form-control']) !!} 
											</div>

											<div class="col-md-2">
												<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_fecha_temp_alta()"><i class="fa fa-plus fa-fw"></i></button>
												<button type="button" class="btn btn-danger btn-circle remove_fecha" name="remove" onclick="remove_elemento(fechas_1, 'remove_fecha')"><i class="fa fa-minus fa-fw"></i></button>
											</div>
										</div>
									</div>
								@endfor
							@else
								<div class="row" id="fechas_1">
									<div class="col-lg-12">
										<div class="col-md-6">
											{!! Form::label('from', 'Desde') !!} 
											<br>{!! Form::text('temp_alta_from[]', "", ['class' => 'form-control temp_alta_from', 'id' => 'from_1']) !!}
										</div>

										<div class="col-md-6">
											{!! Form::label('to', 'Hasta') !!}
											<br>{!! Form::text('temp_alta_to[]', "", ['class' => 'form-control temp_alta_to', 'id' => 'to_1']) !!}
										</div>
									</div>
									<div class="col-lg-12">
										<div class="col-md-2">
											<br>{!! Form::label('cant_dias', 'Cantidad de días') !!}
											<br>{!! Form::selectRange('temp_alta_cant_dias[]', 4, 15, "", ['class' => 'form-control']); !!}
										</div>

										<div class="col-md-3">
											<br>{!! Form::label('gross', 'Gross') !!}
											<br>{!! Form::text('temp_alta_gross[]', "", ['class' => 'form-control']) !!}
										</div>

										<div class="col-md-3">
											<br>{!! Form::label('neto', 'Neto') !!}
											<br>{!! Form::text('temp_alta_neto[]', "", ['class' => 'form-control']) !!}
										</div>

										<div class="col-md-2">
											<br>{!! Form::label('comision_glc', 'Comisión') !!}
											<br>{!! Form::text('temp_alta_comision_glc[]', "", ['class' => 'form-control']) !!} 
										</div>

										<div class="col-md-2">
											<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_fecha_temp_alta()"><i class="fa fa-plus fa-fw"></i></button>
											<button type="button" class="btn btn-danger btn-circle remove_fecha" name="remove" onclick="remove_elemento(fechas_1, 'remove_fecha')"><i class="fa fa-minus fa-fw"></i></button>
										</div>
									</div>
								</div>
							@endif
						</div>
		            </div>

		        </div>
		    </div>

		    <div class="panel" id="panel_politicas">
		        <div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-target="#detalles_politicas" href="#detalles_politicas" class="collapsed"> Políticas <span id="politicas_falta_info" style="color: red;"></span></a></h4>
		        </div>
		        <div id="detalles_politicas" class="panel-collapse collapse">
		            <div class="panel-body">
		            	<div class="col-md-6">
							{!! Form::label('politicas_pago', 'Políticas de pago') !!}
							<br>{!! Form::textarea('politicas_pago', $embarcacion->politicas_pago, ['class' => 'form-control politicas_fields', 'size' => '15x10', 'style' => 'resize:none', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
						</div>

						<div class="col-md-6">
							{!! Form::label('cancelaciones', 'Cancelaciones') !!}
							<br>{!! Form::textarea('cancelaciones', $embarcacion->cancelaciones, ['class' => 'form-control politicas_fields', 'size' => '15x10', 'style' => 'resize:none', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
						</div>
		            </div>
		        </div>
		    </div>
		</div>

		<br><br>
		<div class="row" style="text-align: center;">
			{!! Form::button('Registrar', ['class' => 'btn btn-success', 'id' => 'submit_form_embarcacion']) !!}
		</div>

	{!! Form::close() !!}
</div>
@stop

@section('scripts')

<script type="text/javascript">
	function readURL(input, id) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#'+id).attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }else{
	    	$('#'+id).attr('src', '{{URL::asset('images/app/preview-image-icon.png')}}');
	    }
	}

	$("#cambiar_im_planos_cubierta").change(function(){
	    readURL(this, 'planos_cubierta_img');
	});

	$("#cambiar_im_gral").change(function(){
	    readURL(this, 'imagen_gral_img');
	});

    var cont_tarifas = 1;
    var cont_fechas = 1;
    date('from_1', 'to_1');
    getModelosEmbarcacion({{ $embarcacion->modelos_embarcacion->tipos_embarcacion->id }});
    contar_fields();

	function contar_fields(){
		var count_detalles_generales_falta_info = 0;
		var count_detalles_tecnicos_falta_info = 0;
		var count_politicas_falta_info = 0;

		$('.detalles_generales_fields').filter(function(input){
			if($(this).val() == ""){
				count_detalles_generales_falta_info++;
			}
        });

		$('.detalles_tecnicos_fields').filter(function(input){
			if($(this).val() == ""){
				count_detalles_tecnicos_falta_info++;
			}
        });

        $('.politicas_fields').filter(function(input){
        	console.log($(this).val());
			if($(this).val() == ""){
				count_politicas_falta_info++;
			}
        });

		if(count_detalles_generales_falta_info > 0){
			$("#detalles_generales_falta_info").html('(' +count_detalles_generales_falta_info+')');
		}else{
			$("#detalles_generales_falta_info").html('<i class="fa fa-check" style="color:green;"></i>');
		}

		if(count_detalles_tecnicos_falta_info > 0){
			$("#detalles_tecnicos_falta_info").html('(' +count_detalles_tecnicos_falta_info+')');
		}else{
			$("#detalles_tecnicos_falta_info").html('<i class="fa fa-check" style="color:green;"></i>');
		}

		if(count_politicas_falta_info > 0){
			$("#politicas_falta_info").html('(' +count_politicas_falta_info+')');
		}else{
			$("#politicas_falta_info").html('<i class="fa fa-check" style="color:green;"></i>');
		}
	}

    $(function() {
    	Dropzone.autoDiscover = false;

    	var dZDeckPlan = $("#dZDeckPlan").dropzone({
    		headers: {
		        'X-CSRF-Token': "{{ csrf_token() }}",
		    },

		    addRemoveLinks: true,
			autoProcessQueue: false,
			uploadMultiple: true,
			parallelUploads: 100,
			maxFiles: 100,
			url: "{{ route('admin.embarcacion.update') }}",

			// The setting up of the dropzone
			init: function() {
				var myDropzone = this;
				var submit_form_embarcacion = document.querySelector("#submit_form_embarcacion");

				// First change the button to actually tell Dropzone to process the queue.
				submit_form_embarcacion.addEventListener("click", function(e) {
					// Make sure that the form isn't actually being sent.
					e.preventDefault();
					e.stopPropagation();
					var nombre_embarcacion = document.getElementById("nombre_embarcacion").value;
					if((nombre_embarcacion == "") || (nombre_embarcacion == undefined)){
						$("#div_detalles_generales_error").show();
						$("#detalles_generales_error").html("<ul><li>El nombre de la embarcación no puede estar vacío</li></ul>");
					}else{
						$("#editar_embarcacion_form").submit();	
						//myDropzone.processQueue();
					}
				});

				// Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
				// of the sending event because uploadMultiple is set to true.
				this.on("sendingmultiple", function() {
					// Gets triggered when the form is actually being sent.
					// Hide the success button or the complete form.
				});

				this.on("successmultiple", function(files, response) {
					// Gets triggered when the files have successfully been sent.
					// Redirect user or notify of success.
				});

				this.on("errormultiple", function(files, response) {
					// Gets triggered when there was an error sending the files.
					// Maybe show form again, and notify user of error
				});
			}
	    });

    });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch(error) {
            date = null;
        }
        return date;
    }

    function date(from, to){
        var dateFormat = 'dd-mm-yy',
            
        temp_alta_from = $("#"+from).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            format: 'dd-mm-yy',
        }).on( "change", function() {
            temp_alta_to.datepicker( "option", "minDate", getDate(this));
        }),
        
        temp_alta_to = $("#"+to).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            format: 'dd-mm-yy',
        }).on( "change", function() {
            temp_alta_from.datepicker( "option", "maxDate", getDate(this));
        });
    }

    $("#add_itinerario").click(function(){
        var nombre_itinerario = document.getElementById("it_nombre").value.toUpperCase();
        var nombre_itinerario_original = nombre_itinerario;
        nombre_itinerario = nombre_itinerario.split(" ").join("_");
        var cant_dias = document.getElementById("it_cant_dias").value;
        var dia_inicio = document.getElementById("it_dia_inicio").value;
        var dias = {!! json_encode($dias) !!};
        var cantd_dias = parseInt(cant_dias) + parseInt(dia_inicio);

        if((nombre_itinerario != "") && (nombre_itinerario != undefined)){
            var itinerario = '<div class="panel" id="panel_itinerario_'+ nombre_itinerario +'"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-target="#detalle_itinerario_'+ nombre_itinerario +'" href="#detalle_itinerario_'+ nombre_itinerario +'" class="collapsed"> '+ nombre_itinerario_original +' </a> <button type="button" class="btn btn-sm btn-danger remove_itinerario" name="remove" onclick="remove_elemento(panel_itinerario_'+ nombre_itinerario +', null)"><i class="fa fa-minus fa-fw"></i></button></h4></div><div id="detalle_itinerario_'+ nombre_itinerario +'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12"><ul class="list-inline gallery"><li><img id="imagen_it_'+ nombre_itinerario +'" class="img-responsive thumbnail zoom" src="{{URL::asset('images/app/preview-image-icon.png')}}" alt="Itinerario '+ nombre_itinerario +'" height="250" width="250"></li></ul><br><input name="imagen_itinerario['+ nombre_itinerario +']" type="file" class="form-control" accept="image/*" onchange="javascript:readURL(this, \'imagen_it_'+ nombre_itinerario +'\');" ></div><div class="col-lg-12"><table class="table table-bordered"><tbody>';
            var cont = 1;

            for (var i = dia_inicio; i < cantd_dias; i++) {
                
                if(i > 7){
                    
                    dia_inicio = 1;
                    itinerario += '<tr><td rowspan="2">'+ dias[cont] +'<input name=dias['+ nombre_itinerario +'][] class="form-control" value="'+cont+'" type="hidden" /></td><td>am</td><td><select name=am['+ nombre_itinerario +'][] class="form-control sitios_turisticos" ></select></td></tr><tr><td>pm</td><td><select name=pm['+ nombre_itinerario +'][] class="form-control sitios_turisticos" ></select></td></tr>';    
                    cont++;
                    
                    if(cont > 7){
                        cont = 1;
                    }

                }else{
                    itinerario += '<tr><td rowspan="2">'+ dias[i] +'<input name=dias['+ nombre_itinerario +'][] class="form-control" value="'+i+'" type="hidden" /></td><td>am</td><td><select name=am['+ nombre_itinerario +'][] class="form-control sitios_turisticos" ></select></td></tr><tr><td>pm</td><td><select name=pm['+ nombre_itinerario +'][] class="form-control sitios_turisticos" ></select></td></tr>';  
                }
            };

            itinerario += '</tbody></table></div></div></div></div>';
            var tipos_patente = document.getElementById("tipos_patente");
			var patente = tipos_patente.options[tipos_patente.selectedIndex].value;
            getSitiosTuristicos(patente);
            $("#itinerarios").append(itinerario);
        }else {
            alert("Debe escoger un nombre para el itinerario");
        }
    });
    
    function add_tarifa(){
        var tarifario = "";
        var class_item = "'remove_tarifa'";
        cont_tarifas++;

        tarifario += '<div class="col-lg-12" id="tarifario_'+ cont_tarifas +'">';
        tarifario += '<div class="col-md-2">';
        tarifario += '<br><label for="cant_dias">Cantidad de días</label>';
        tarifario += '<br><select class="form-control" name="cant_dias[]"><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option></select>';
        tarifario += '</div>';
        tarifario += '<div class="col-md-3">';
        tarifario += '<br><label for="gross">Gross</label>';
        tarifario += '<br><input class="form-control" name="gross[]" type="text" value="">';
        tarifario += '</div>';
        tarifario += '<div class="col-md-3">';
        tarifario += '<br><label for="neto">Neto</label>';
        tarifario += '<br><input class="form-control" name="neto[]" type="text" value="">';
        tarifario += '</div>';
        tarifario += '<div class="col-md-2">';
        tarifario += '<br><label for="comision_glc">Comisión</label>';
        tarifario += '<br><input class="form-control" name="comision_glc[]" type="text" value=""> ';
        tarifario += '</div>';
        tarifario += '<div class="col-md-2">';
        tarifario += '<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_tarifa()"><i class="fa fa-plus fa-fw"></i></button>';
        tarifario += '<button type="button" class="btn btn-danger btn-circle remove_tarifa" name="remove"onclick=" remove_elemento(tarifario_'+ cont_tarifas +', '+ class_item +')"><i class="fa fa-minus fa-fw"></i></button>';
        tarifario += '</div>';
        tarifario += '</div>';
        $("#tarifario").append(tarifario);
    }

    function add_fecha_temp_alta(){
        var temp_alta = "";
        var class_item = "'remove_fecha'";
        cont_fechas++;

        var id_from = "from_"+cont_fechas;
        var id_to = "to_"+cont_fechas;

        temp_alta += '<div class="row" id="fechas_'+ cont_fechas +'"><div class="col-lg-12">';
        temp_alta += '<div class="col-md-6">';
        temp_alta += '<br><label for="from">Desde</label>';
        temp_alta += '<br><input class="form-control temp_alta_from" name="temp_alta_from[]" type="text" value="" id="'+id_from+'">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-6">';
        temp_alta += '<br><label for="to">Hasta</label>';
        temp_alta += '<br><input class="form-control temp_alta_to" name="temp_alta_to[]" type="text" value="" id="'+id_to+'">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-lg-12">';
        temp_alta += '<div class="col-md-2">';
        temp_alta += '<br><label for="temp_alta_cant_dias">Cantidad de días</label>';
        temp_alta += '<br><select class="form-control" name="temp_alta_cant_dias[]"><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option></select>';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-3">';
        temp_alta += '<br><label for="temp_alta_gross">Gross</label>';
        temp_alta += '<br><input class="form-control" name="temp_alta_gross[]" type="text" value="">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-3">';
        temp_alta += '<br><label for="temp_alta_neto">Neto</label>';
        temp_alta += '<br><input class="form-control" name="temp_alta_neto[]" type="text" value="">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-2">';
        temp_alta += '<br><label for="temp_alta_comision_glc">Comisión</label>';
        temp_alta += '<br><input class="form-control" name="temp_alta_comision_glc[]" type="text" value=""> ';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-2">';
        temp_alta += '<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_fecha_temp_alta()"><i class="fa fa-plus fa-fw"></i></button>';
        temp_alta += '<button type="button" class="btn btn-danger btn-circle remove_fecha" name="remove"onclick=" remove_elemento(fechas_'+ cont_fechas +', '+ class_item +')"><i class="fa fa-minus fa-fw"></i></button>';
        temp_alta += '</div>';
        temp_alta += '</div></div></div>';

        $("#fechas_temp_alta").append(temp_alta);
        date(id_from, id_to);
    }

    function remove_elemento(element, class_item){
        if(class_item != null){
            var numItems = $('.' + class_item).length;
            //console.log(numItems);
            if(numItems > 1){
                $("#" + element.id).remove();
            }   
        }else{
            $("#" + element.id).remove();
        }
    }

    function getModelosEmbarcacion(id){
        $.get("{{ url('admin/embarcacion/modelos_embarcacion') }}", 
            { id_tipo_embarcacion: id }, 
            function(data) {
                var modelos_embarcacion = $('#modelos_embarcacion');
                modelos_embarcacion.empty();

                $.each(data, function(index, element) {
                	if(element.id == {{ $embarcacion->modelos_embarcacion->id }}){
                		modelos_embarcacion.append("<option value='"+ element.id +"' selected>" + element.descripcion + "</option>");
                	}else{
                		modelos_embarcacion.append("<option value='"+ element.id +"'>" + element.descripcion + "</option>");
                	}
                });
            });
    }

    function getSitiosTuristicos(patente){
        $.get("{{ url('admin/embarcacion/sitios_turisticos') }}", 
            { patente: patente }, 
            function(data) {
                var sitios_turisticos = $('.sitios_turisticos');
                sitios_turisticos.empty();

                $.each(data, function(index, element) {
                    sitios_turisticos.append("<option value='"+ element.sitio +"'>" + element.sitio + "</option>");
                });
            });
    }

    $("#tipo_embarcacion").change(function(){
        getModelosEmbarcacion(this.value);
    });

    $("#tipos_patente").change(function(){
        getSitiosTuristicos(this.value);
    });
        
</script>
@stop

</body>
</html>