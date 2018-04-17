@extends('layouts.dashboard')
@section('page_heading','Registrar Embarcación')
@section('section')

<div class="col-lg-12">

    {!! Form::open(array('url' => route('admin.embarcacion.store'), 'files' => true, 'id' => 'registrar_embarcacion_form')) !!}
		
		{{ csrf_field() }}

		<div class="panel-group" id="accordion">
			<div class="panel" id="panel_detalles_generales">
				<div class="panel-heading">
					<h4 class="panel-title"> <a data-toggle="collapse" data-target="#detalles_generales" href="#detalles_generales" class="collapsed">Información General</a></h4>
				</div>
				<div id="detalles_generales" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="col-md-6">
							<br>{!! Form::label('nombre', "Nombre*") !!}
							<br>{!! Form::text('nombre', "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('anyo_construccion', 'Año de construcción') !!}
							<br>{!! Form::text('anyo_construccion', "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('refit') !!}
							<br>{!! Form::text('refit', "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('puerto_registro_id', 'Puerto de registro*') !!}
							<br>{!! Form::select('puerto_registro_id', $puertos, null, ['class' => 'form-control']) !!}
						</div>
						<div class="col-md-6">
							<br>{!! Form::label('tipo_embarcacion_id', 'Tipo*') !!}
							<br>{!! Form::select('tipo_embarcacion_id', $tipos_embarcacion, null, ['class' => 'form-control', 'id' => 'tipo_embarcacion']) !!}

							<br>{!! Form::label('modelos_embarcacion_id', 'Modelo') !!}
							<br>{!! Form::select('modelos_embarcacion_id', $modelos, null, ['class' => 'form-control', 'id' => 'modelos_embarcacion']) !!}

							<br>{!! Form::label('companias_embarcacion_id', 'Operador / Propietario*') !!}
							<br>{!! Form::select('companias_embarcacion_id', $companias_embarcacion, null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('tipos_patente_id', 'Tipo de patente*') !!}
							<br>{!! Form::select('tipos_patente_id', $tipos_patente, null, ['class' => 'form-control', 'id' => 'tipos_patente']) !!}
						</div>
						
						<div class="col-md-12">

			                <br>{!! Form::label('deck_plan', 'Planos de cubierta') !!}
							<div id="dZDeckPlan" class="dropzone">
							    <div></div>
							</div>
		                
		            	</div>

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
							{!! Form::label('capacidad') !!}
							<br>{!! Form::text('capacidad', "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('eslora') !!}
							<br>{!! Form::text('eslora', "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('manga') !!}
							<br>{!! Form::text('manga', "", ['class' => 'form-control']) !!}
							
							<br>{!! Form::label('puntal') !!}
							<br>{!! Form::text('puntal', "", ['class' => 'form-control']) !!}
							
							<br>{!! Form::label('velocidad_crucero', 'Velocidad de crucero') !!}
							<br>{!! Form::text('velocidad_crucero', "", ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-4">
							{!! Form::label('nro_tripulantes', 'Cant. de Tripulantes') !!}
							<br>{!! Form::text('nro_tripulantes', "", ['class' => 'form-control']) !!}

							<br>{!! Form::label('estabilizadores') !!}
							<br>{!! Form::select('estabilizadores', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('internet') !!}
							<br>{!! Form::select('internet', array('Si' => 'Si', 'No' => 'No'), null, ['class' => 'form-control']) !!}

							<br>{!! Form::label('kayacks', 'Cant. de kayacks') !!}
							<br>{!! Form::text('kayacks', "", ['class' => 'form-control']) !!}
						</div>
						
						<div class="col-md-4">
							{!! Form::label('paddle_boards', 'Cant. de paddle boards') !!}
							<br>{!! Form::text('paddle_boards', "", ['class' => 'form-control']) !!}

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
		            	<!--<div class="col-lg-12">
			            	<div class="col-md-3">
								<br>{!! Form::label('tarifa_temp_alta', 'Tarifa de temporada alta') !!}
								{!! Form::text('tarifa_temp_alta', "", ['class' => 'form-control', 'size' => '4']) !!}
							</div>
						</div>-->
						<div class="col-lg-12" id="tarifario_1">
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
						
						<div id="tarifario"></div>

						<div class="col-lg-12">
							<br><br>{!! Form::label('fechas_temp_alta', 'Fechas de temporada alta') !!}
							<hr>
						</div>

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
						<div id="fechas_temp_alta"></div>
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
							<br>{!! Form::textarea('politicas_pago', "", ['class' => 'form-control', 'size' => '15x10', 'style' => 'resize:none']) !!}
						</div>

						<div class="col-md-6">
							{!! Form::label('cancelaciones', 'Cancelaciones') !!}
							<br>{!! Form::textarea('cancelaciones', "", ['class' => 'form-control', 'size' => '15x10', 'style' => 'resize:none']) !!}
						</div>
		            </div>
		        </div>
		    </div>
		</div>

		<br><br>
		<div class="row" style="text-align: center;">
			{!! Form::submit('Registrar', ['class' => 'btn btn-success', 'id' => 'submit_form_embarcacion']) !!}
		</div>

	{!! Form::close() !!}
</div>
@stop

@section('scripts')

<script type="text/javascript">
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
			url: "{{ route('admin.embarcacion.store') }}",

			// The setting up of the dropzone
			init: function() {
				var myDropzone = this;
				var submit_form_embarcacion = document.querySelector("#submit_form_embarcacion");

				// First change the button to actually tell Dropzone to process the queue.
				submit_form_embarcacion.addEventListener("click", function(e) {
					// Make sure that the form isn't actually being sent.
					e.preventDefault();
					e.stopPropagation();
					myDropzone.processQueue();
					//document.querySelector("#registrar_embarcacion_form").submit();
				});

				// Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
				// of the sending event because uploadMultiple is set to true.
				this.on("sendingmultiple", function() {
					// Gets triggered when the form is actually being sent.
					// Hide the success button or the complete form.
					document.querySelector("#registrar_embarcacion_form").submit();
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

    var cont_tarifas = 1;
    var cont_fechas = 1;
    date('from_1', 'to_1');
    getModelosEmbarcacion(1);

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
            format: 'dd-mm-yy',
        }).on( "change", function() {
            temp_alta_to.datepicker( "option", "minDate", getDate(this));
        }),
        
        temp_alta_to = $("#"+to).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            format: 'dd-mm-yy',
        }).on( "change", function() {
            temp_alta_from.datepicker( "option", "maxDate", getDate(this));
        });
    }

    $("#add_itinerario").click(function(){
        var nombre_itinerario = document.getElementById("it_nombre").value.toUpperCase();
        var cant_dias = document.getElementById("it_cant_dias").value;
        var dia_inicio = document.getElementById("it_dia_inicio").value;
        var dias = {!! json_encode($dias) !!};
        var cantd_dias = parseInt(cant_dias) + parseInt(dia_inicio);

        if((nombre_itinerario != "") && (nombre_itinerario != undefined)){
            var itinerario = '<div class="panel" id="panel_itinerario_'+ nombre_itinerario +'"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-target="#detalle_itinerario_'+ nombre_itinerario +'" href="#detalle_itinerario_'+ nombre_itinerario +'" class="collapsed"> '+ nombre_itinerario +' </a> <button type="button" class="btn btn-sm btn-danger remove_itinerario" name="remove" onclick="remove_elemento(panel_itinerario_'+ nombre_itinerario +', null)"><i class="fa fa-minus fa-fw"></i></button></h4></div><div id="detalle_itinerario_'+ nombre_itinerario +'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12"><table class="table table-bordered"><tbody>';
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
        
</script>
@stop

</body>
</html>