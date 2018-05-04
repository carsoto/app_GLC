@extends('layouts.dashboard')
@section('page_heading', 'Registrar embarcación')
@section('section')
<div class="col-lg-12">

   	{!! Form::open(array('url' => route('admin.embarcacion.store'), 'files' => true, 'id' => 'registrar_embarcacion_form', 'runat' => 'server')) !!}
	
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
							{!! Form::hidden('id_embarcacion', "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('nombre', "Nombre*") !!}
							<br>{!! Form::text('nombre', "", ['class' => 'form-control detalles_generales_fields', 'id' => 'nombre_embarcacion', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('anyo_construccion', 'Año de construcción') !!}
							<br>{!! Form::text('anyo_construccion', "", ['class' => 'form-control detalles_generales_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('refit') !!}
							<br>{!! Form::text('refit', "", ['class' => 'form-control detalles_generales_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('puerto_registro_id', 'Puerto de registro*') !!}
							<br>{!! Form::select('puerto_registro_id', $puertos, null, ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-6">
							<br>{!! Form::label('tipo_embarcacion_id', 'Tipo*') !!}
							<br>{!! Form::select('tipo_embarcacion_id', $tipos_embarcacion, "", ['class' => 'form-control', 'id' => 'tipo_embarcacion']) !!}

							<br>{!! Form::label('modelos_embarcacion_id', 'Modelo') !!}
							<br>{!! Form::select('modelos_embarcacion_id', $modelos, "", ['class' => 'form-control', 'id' => 'modelos_embarcacion']) !!}

							<br>{!! Form::label('companias_embarcacion_id', 'Operador / Propietario*') !!}
							<br>{!! Form::select('companias_embarcacion_id', $companias_embarcacion, "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('tipos_patente_id', 'Tipo de patente*') !!}
							<br>{!! Form::select('tipos_patente_id', $tipos_patente, "", ['class' => 'form-control', 'id' => 'tipos_patente']) !!}
						</div>

						<div class="col-md-12">
							<br>{!! Form::label('planos_cubierta', 'Planos de cubierta') !!}
							<br>{!! Form::file('planos_cubierta[]', ['id' => 'cambiar_im_planos_cubierta', 'accept' => 'image/*', 'multiple' => true]) !!}
							<output id="list_im_planos_cubierta"></output>
						</div>
						<div class="col-md-12">
							<br>{!! Form::label('imagen_general', 'Imagen general') !!}
							<br>{!! Form::file('imagen_general[]', ['id' => 'cambiar_im_gral', 'accept' => 'image/*', 'multiple' => true]) !!}
							<output id="list_im_gral"></output>
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
							<br>{!! Form::text('capacidad', "", ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('eslora') !!}
							<br>{!! Form::text('eslora', "", ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('manga') !!}
							<br>{!! Form::text('manga', "", ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
							
							<br>{!! Form::label('puntal') !!}
							<br>{!! Form::text('puntal', "", ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
							
							<br>{!! Form::label('velocidad_crucero', 'Velocidad de crucero') !!}
							<br>{!! Form::text('velocidad_crucero', "", ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
						</div>

						<div class="col-md-4">
							{!! Form::label('nro_tripulantes', 'Cant. de Tripulantes') !!}
							<br>{!! Form::text('nro_tripulantes', "", ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('estabilizadores') !!}
							<br>{!! Form::select('estabilizadores', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('internet') !!}
							<br>{!! Form::select('internet', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('kayacks', 'Cant. de kayacks') !!}
							<br>{!! Form::text('kayacks', "", ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
						</div>
						
						<div class="col-md-4">
							{!! Form::label('paddle_boards', 'Cant. de paddle boards') !!}
							<br>{!! Form::text('paddle_boards', "", ['class' => 'form-control detalles_tecnicos_fields', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}

							<br>{!! Form::label('trajes_neopreno', 'Trajes de neopreno') !!}
							<br>{!! Form::select('trajes_neopreno', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('equipo_snorkel', 'Equipo de snorkel') !!}
							<br>{!! Form::select('equipo_snorkel', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('ameneties') !!}
							<br>{!! Form::select('ameneties', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}
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
						<div id="itinerarios"></div>
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
							<div class="row" id="tarifario_1">
				            	<div class="col-md-2">
									{!! Form::label('cant_dias', 'Cantidad de días') !!}
									<br>{!! Form::selectRange('cant_dias[]', 4, 15, "", ['class' => 'form-control']); !!}
								</div>

								<div class="col-md-3">
									{!! Form::label('gross', 'Gross') !!}
									<br>{!! Form::text('gross[]', "", ['class' => 'form-control']) !!}
								</div>

								<div class="col-md-3">
									{!! Form::label('neto', 'Neto') !!}
									<br>{!! Form::text('neto[]', "", ['class' => 'form-control']) !!}
								</div>

								<div class="col-md-2">
									{!! Form::label('comision_glc', 'Comisión') !!}
									<br>{!! Form::text('comision_glc[]', "", ['class' => 'form-control']) !!} 
								</div>
								<div class="col-md-2">
									<br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_tarifa()"><i class="fa fa-plus fa-fw"></i></button>
									<button type="button" class="btn btn-danger btn-circle remove_tarifa" name="remove" onclick="remove_elemento(tarifario_1, 'remove_tarifa')"><i class="fa fa-minus fa-fw"></i></button>
								</div>
							</div>
						</div>
						<div class="row">
							<br><br>{!! Form::label('fechas_temp_alta', 'Fechas de temporada alta') !!}
							<hr>
						</div>
						<div id="fechas_temp_alta">
							<div class="row" id="fechas_1">
								<div class="col-lg-12">
									<div class="col-md-6">
										{!! Form::label('from', 'Desde') !!} 
										<br>{!! Form::text('temp_alta_from[]',"", ['class' => 'form-control temp_alta_from', 'id' => 'from_1']) !!}
									</div>

									<div class="col-md-6">
										{!! Form::label('to', 'Hasta') !!}
										<br>{!! Form::text('temp_alta_to[]', "", ['class' => 'form-control temp_alta_to', 'id' => 'to_1']) !!}
									</div>
								</div>
								<div class="col-lg-12">
									<div class="col-md-3">
										<br>{!! Form::label('gross', 'Gross') !!}
										<br>{!! Form::text('temp_alta_gross[]', "", ['class' => 'form-control']) !!}<br>
									</div>

									<div class="col-md-3">
										<br>{!! Form::label('neto', 'Neto') !!}
										<br>{!! Form::text('temp_alta_neto[]', "", ['class' => 'form-control']) !!}<br>
									</div>

									<div class="col-md-3">
										<br>{!! Form::label('comision_glc', 'Comisión') !!}
										<br>{!! Form::text('temp_alta_comision_glc[]', "", ['class' => 'form-control']) !!} <br>
									</div>

									<div class="col-md-3">
										<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_fecha_temp_alta()"><i class="fa fa-plus fa-fw"></i></button>
										<button type="button" class="btn btn-danger btn-circle remove_fecha" name="remove" onclick="remove_elemento(fechas_1, 'remove_fecha')"><i class="fa fa-minus fa-fw"></i></button>
									</div>
								</div>
							</div>
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
							<br>{!! Form::textarea('politicas_pago', "", ['class' => 'form-control politicas_fields', 'size' => '15x10', 'style' => 'resize:none', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
						</div>

						<div class="col-md-6">
							{!! Form::label('cancelaciones', 'Cancelaciones') !!}
							<br>{!! Form::textarea('cancelaciones', "", ['class' => 'form-control politicas_fields', 'size' => '15x10', 'style' => 'resize:none', 'onkeypress' => "contar_fields();", 'onkeydown' => "contar_fields();"]) !!}
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

    var cont_tarifas = 1;
    var cont_fechas = 1;
    getModelosEmbarcacion(1);
    contar_fields();
    var fotos_grales = 0;
	
	/*$(".temp_alta_from").each(function( index ) {
		_datePicker($(this).attr("id"));
	});

	$(".temp_alta_to").each(function( index ) {
		_datePicker($(this).attr("id"));
	});*/

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
				/*var $fileUpload = $("input[type='file']");
				if (parseInt($fileUpload.get(0).files.length) > 3){
					alert("You are only allowed to upload a maximum of 3 files");
				}*/
				$("#registrar_embarcacion_form").submit();	
				//myDropzone.processQueue();
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

    function _datePicker(id){
    	$("#"+id).datepicker({
    		dateFormat: 'dd-mm-yy',
    		changeMonth: true,
            changeYear: true,
    	});
    }

    /*function date(from, to){
    	temp_alta_to = $("#"+to).datepicker({
    		dateFormat: 'dd-mm-yy',
    		changeMonth: true,
            changeYear: true,
    	});
    	
    	temp_alta_from = $("#"+from).datepicker({
    		dateFormat: 'dd-mm-yy',
    		changeMonth: true,
            changeYear: true,
    	});
        /*temp_alta_from = $("#"+from).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
        }).on( "change", function() {
            temp_alta_to.datepicker( "option", "minDate", getDate(this));
        }),
        
        temp_alta_to = $("#"+to).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
        }).on( "change", function() {
            temp_alta_from.datepicker( "option", "maxDate", getDate(this));
        });**
    }*/

    $("#add_itinerario").click(function(){
        var nombre_itinerario = document.getElementById("it_nombre").value.toUpperCase();
        var nombre_itinerario_original = nombre_itinerario;
        nombre_itinerario = nombre_itinerario.split(" ").join("_");
        var cant_dias = document.getElementById("it_cant_dias").value;
        var dia_inicio = document.getElementById("it_dia_inicio").value;
        var dias = {!! json_encode($dias) !!};
        var cantd_dias = parseInt(cant_dias) + parseInt(dia_inicio);

        if((nombre_itinerario != "") && (nombre_itinerario != undefined)){
            var itinerario = '<div class="panel" id="panel_itinerario_'+ nombre_itinerario +'"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-target="#detalle_itinerario_'+ nombre_itinerario +'" href="#detalle_itinerario_'+ nombre_itinerario +'" class="collapsed"> '+ nombre_itinerario_original +' </a> <button type="button" class="btn btn-sm btn-danger remove_itinerario" name="remove" onclick="remove_elemento(panel_itinerario_'+ nombre_itinerario +', null)"><i class="fa fa-minus fa-fw"></i></button></h4></div><div id="detalle_itinerario_'+ nombre_itinerario +'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12"><ul class="list-inline gallery"><li><img id="imagen_it_'+ nombre_itinerario +'" class="img-responsive thumb gallery zoom" src="{{URL::asset('images/app/preview-image-icon.png')}}" alt="Itinerario '+ nombre_itinerario +'" height="250" width="250"></li></ul><br><input name="imagen_itinerario['+ nombre_itinerario +']" type="file" class="form-control" accept="image/*" onchange="javascript:readURL(this, \'imagen_it_'+ nombre_itinerario +'\');" ></div><div class="col-lg-12"><table class="table table-bordered"><tbody>';
            //var itinerario = '<div class="panel" id="panel_itinerario_'+ nombre_itinerario +'"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-target="#detalle_itinerario_'+ nombre_itinerario +'" href="#detalle_itinerario_'+ nombre_itinerario +'" class="collapsed"> '+ nombre_itinerario_original +' </a> <button type="button" class="btn btn-sm btn-danger remove_itinerario" name="remove" onclick="remove_elemento(panel_itinerario_'+ nombre_itinerario +', null)"><i class="fa fa-minus fa-fw"></i></button></h4></div><div id="detalle_itinerario_'+ nombre_itinerario +'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12"><ul class="list-inline gallery"><li><img id="imagen_it_'+ nombre_itinerario +'" class="img-responsive thumb" src="{{URL::asset('images/app/preview-image-icon.png')}}" alt="Itinerario '+ nombre_itinerario +'" height="100" width="100"></li></ul><br><input name="imagen_itinerario['+ nombre_itinerario +']" type="file" class="form-control" accept="image/*" onchange="javascript:readURL(this, \'imagen_it_'+ nombre_itinerario +'\');" ></div><div class="col-lg-12"><table class="table table-bordered"><tbody>';
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

        tarifario += '<div class="row" id="tarifario_'+ cont_tarifas +'">';
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
        temp_alta += '<div class="col-md-3">';
        temp_alta += '<br><label for="temp_alta_gross">Gross</label>';
        temp_alta += '<br><input class="form-control" name="temp_alta_gross[]" type="text" value="">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-3">';
        temp_alta += '<br><label for="temp_alta_neto">Neto</label>';
        temp_alta += '<br><input class="form-control" name="temp_alta_neto[]" type="text" value="">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-3">';
        temp_alta += '<br><label for="temp_alta_comision_glc">Comisión</label>';
        temp_alta += '<br><input class="form-control" name="temp_alta_comision_glc[]" type="text" value=""> ';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-3">';
        temp_alta += '<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_fecha_temp_alta()"><i class="fa fa-plus fa-fw"></i></button>';
        temp_alta += '<button type="button" class="btn btn-danger btn-circle remove_fecha" name="remove"onclick=" remove_elemento(fechas_'+ cont_fechas +', '+ class_item +')"><i class="fa fa-minus fa-fw"></i></button>';
        temp_alta += '</div></div></div>';

        $("#fechas_temp_alta").append(temp_alta);
        _datePicker(id_from);
        _datePicker(id_to);
    }

    function remove_elemento(element, class_item){
        if(class_item != null){
            var numItems = $('.' + class_item).length;
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
	                modelos_embarcacion.append("<option value='"+ element.id +"'>" + element.descripcion + "</option>");
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

    function getCount(parent, getChildrensChildren){
	    var relevantChildren = 0;
	    var children = parent.childNodes.length;
	    for(var i=0; i < children; i++){
	        if(parent.childNodes[i].nodeType != 3){
	            if(getChildrensChildren)
	                relevantChildren += getCount(parent.childNodes[i],true);
	            relevantChildren++;
	        }
	    }
	    return relevantChildren;
	}

	function fileSelectPlanos(evt) {

		var element = document.getElementById("list_im_planos_cubierta");

		if(getCount(element, false) < 5){
			var files = evt.target.files; // FileList object
			var cantidad_archivos = files.length + getCount(element, false);

			if(cantidad_archivos <= 5){
				// Loop through the FileList and render image files as thumbnails.
				for (var i = 0, f; f = files[i]; i++) {

					// Only process image files.
					if (!f.type.match('image.*')) {
						continue;
					}

					var reader = new FileReader();

					// Closure to capture the file information.
					reader.onload = (function(theFile) {
						return function(e) {
							// Render thumbnail.
							var span = document.createElement('span');
							//<button style="position: absolute; margin-top: 10px; z-index: 100;" type="button" class="close" onclick="" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							span.innerHTML = ['<img class="thumb zoom" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
							document.getElementById('list_im_planos_cubierta').insertBefore(span, null);
						};
					})(f);

					// Read in the image file as a data URL.
					reader.readAsDataURL(f);
				}
			}else{
				alert("Solo puede agregar 5 fotos máximo");
			}
			
		}else{
			alert("Solo puede agregar 5 fotos máximo");
		}
	}

	function fileSelectGral(evt) {

		var element = document.getElementById("list_im_gral");

		if(getCount(element, false) < 10){
			var files = evt.target.files; // FileList object
			var cantidad_archivos = files.length + getCount(element, false);

			if(cantidad_archivos <= 10){
				// Loop through the FileList and render image files as thumbnails.
				for (var i = 0, f; f = files[i]; i++) {

					// Only process image files.
					if (!f.type.match('image.*')) {
						continue;
					}

					var reader = new FileReader();

					// Closure to capture the file information.
					reader.onload = (function(theFile) {
						return function(e) {
							// Render thumbnail.
							var span = document.createElement('span');
							//<button style="position: absolute; margin-top: 10px; z-index: 100;" type="button" class="close" onclick="" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							span.innerHTML = ['<img class="thumb zoom" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
							document.getElementById('list_im_gral').insertBefore(span, null);
						};
					})(f);

					// Read in the image file as a data URL.
					reader.readAsDataURL(f);
				}
			}else{
				alert("Solo puede agregar 10 fotos máximo");
			}
			
		}else{
			alert("Solo puede agregar 10 fotos máximo");
		}
	}

	document.getElementById('cambiar_im_planos_cubierta').addEventListener('change', fileSelectPlanos, false);
	document.getElementById('cambiar_im_gral').addEventListener('change', fileSelectGral, false);

</script>
@stop

</body>
</html>