@extends('layouts.dashboard')
@section('page_heading','Registrar Charter')
@section('section')

<div class="col-lg-12">
<br />
    <form role="form" id="form_registrar_charter" action="{{ route('admin.charters.nuevo') }}" method="POST" enctype="multipart/form-data">
    	{{ csrf_field() }} 
    	<input type="hidden" id="datos_embarcacion" data-embarcacion="{{ $embarcacion }}">
        <fieldset>
        	<div class="row">
    			<div class="col-md-4">
	        		<div class="form-group">
		                <label>Código Charter</label>
		                <input type="hidden" name="id_charter" id="id_charter">
		                <p class="form-control-static"><span name='codigo_charter' id='codigo_charter'>CHT-</span></p>
	            	</div>
	            </div>
            	<div class="col-md-4">
					<div class="form-group">
			            <label>Tipo de Charter</label>
			            <br>
			            <input type="hidden" id="tipo_charter_embaraccion">
			            @foreach ($tipo_embarcacion as $tipo)
			            	<label class="checkbox-inline">
			                	<input type="checkbox" name="tipo_charter[]" id="tipo_charter{{ $tipo->id }}" onclick="seleccionar_tipo_charter()" value="{{ $tipo->desc_tipo }}" idembarcacion="{{ $tipo->id }}">{{ $tipo->desc_tipo }}
			            	</label>
						@endforeach
			        </div>
			    </div>
		        <div class="col-md-4">
			        <label>Cliente</label>
					<div class="form-group">
		                <input name="cliente" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)">
		            </div>
		        </div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Intermediario</label>
						<select name="intermediario_id" class="form-control">
							@foreach ($intermediarios as $intermediario)
							<option value="{{ $intermediario->id }}">{{ $intermediario->nombre }}</option>
							@endforeach
							
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-4">
						<label>Adjuntar contrato</label>
						<div class="form-group">
							<input type="hidden" name="max_file_size" value="4194304" />
							<input name="archivo_contrato" type="file">
						</div>
					</div>
				</div>
			</div>

			<div id="contenido_tipo_charter"> </div>
			
			</div>
			<div class="row">
				<div class="col-lg-12" style="text-align: center;">
					<input type="submit" class="btn btn-md btn-success" value="Registrar Charter"></input>
				</div>
			</div>
        </fieldset>
    </form>
</div>
@stop

@section('scripts')
<script type="text/javascript">
	var array_codigo = [];

	function seleccionar_tipo_charter(){
		var tipo_charter = event.target;
		var id_tipo_embarcacion = tipo_charter.getAttribute('idembarcacion');
		var array_tipo = [];
		var id_tipo = tipo_charter.value.replace(/\s/g,"_");
		var id_f_inicio = "#"+id_tipo+"_f_inicio";
		var id_f_fin = "#"+id_tipo+"_f_fin";
		var datos_embarcacion = $('#datos_embarcacion').data('embarcacion');
        var options_embarcacion = '';

        for (i = 0; i < datos_embarcacion.length; i++) {
        	if(datos_embarcacion[i]['tipo_embarcacion_id'] == id_tipo_embarcacion){
        		options_embarcacion += '<option value="' + datos_embarcacion[i]['id'] + '">' + datos_embarcacion[i]['nombre_embarcacion'] + '</option>';
        	}
		}

		if(tipo_charter.checked == true){
			if($.inArray(tipo_charter.value, array_tipo) == -1){
				$("#contenido_tipo_charter").append(
					'<div id=' + id_tipo + '>'+
					'<h2 class="page-header"><span class="titulo_tipo_charter">' + tipo_charter.value + '</span></h2>'+
					'<fieldset>'+
					'	<div class="row">'+
					'		<div class="col-md-4">'+
					'			<div class="form-group">'+
					'				<label>Embarcación</label>'+
					'				<select name="' + id_tipo + '_embarcacion" id="' + id_tipo + '_embarcacion" class="form-control">'+
										options_embarcacion +
					'				</select>'+
					'			</div>'+
					'		</div>'+
					'		<div class="col-md-2">'+
					'			<label>Cant. de pasajeros</label>'+
					'			<div class="form-group">'+
					'				<input name="' + id_tipo + '_c_pasajeros" id="' + id_tipo + '_c_pasajeros" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control">'+
					'			</div>'+
					'		</div>'+
					'		<div class="col-md-6">'+
					'			<div class="col-md-6">'+
					'			<label>F. Inicio</label>'+
					'			<div class="form-group">'+
					'				<div class="input-group date" id="f_inicio">'+
					'					<input name="' + id_tipo + '_f_inicio" id="' + id_tipo + '_f_inicio" type="text" placeholder="dd/mm/yyyy" class="form-control" />'+
					'					<span class="input-group-addon">'+
					'						<span class="fa fa-calendar"></span>'+
					'					</span>'+
					'				</div>'+
					'			</div>'+
					'			</div>'+
					'			<div class="col-md-6">'+
					'				<label>F. Fin</label>'+
					'				<div class="form-group">'+
					'					<div class="input-group date" id="f_fin">'+
					'						<input name="' + id_tipo + '_f_fin" id="' + id_tipo + '_f_fin" type="text" placeholder="dd/mm/yyyy" class="form-control" />'+
					'						<span class="input-group-addon">'+
					'							<span class="fa fa-calendar"></span>'+
					'						</span>'+
					'					</div>'+
					'				</div>'+
					'			</div>'+
					'		</div>'+
					'	</div>'+
					'	<div class="row">'+
					'		<div class="col-md-2">'+
					'			<label>Deluxe</label>'+
					'			<div class="form-group">'+
					'				<label class="toggle">'+
					'					<input name="' + id_tipo + '_deluxe" id="' + id_tipo + '_deluxe" type="checkbox" checked>'+
					'					<span class="slider round"></span>'+
					'				</label>'+
					'			</div>'+
					'		</div>'+
					'		<div class="col-md-2">'+
					'			<label>Tarifa de contrato</label>'+
					'			<div class="form-group input-group">'+
					'				<span class="input-group-addon">$</span>'+
					'				<input name="' + id_tipo + '_t_contrato" id="' + id_tipo + '_t_contrato" type="text" onKeyPress="return tipoMontos(event)" placeholder="000,000.00" class="form-control">'+
					'			</div>'+
					'		</div>'+
					'		<div class="col-md-2">'+
					'			<label>Tarifa neta</label>'+
					'			<div class="form-group input-group">'+
					'				<span class="input-group-addon">$</span>'+
					'				<input name="' + id_tipo + '_t_neta" id="' + id_tipo + '_t_neta" type="text" onKeyPress="return tipoMontos(event)" placeholder="000,000.00" class="form-control">'+
					'			</div>'+
					'		</div>'+
					'		<div class="col-md-6">'+
					'			<div class="col-md-6">'+
					'				<label>Comisión intermediario</label>'+
					'				<div class="form-group input-group">'+
					'					<span class="input-group-addon">$</span>'+
					'					<input name="' + id_tipo + '_t_interm" id="' + id_tipo + '_t_interm" type="text" onKeyPress="return tipoMontos(event)" placeholder="000,000.00" class="form-control">'+
					'				</div>'+
					'			</div>'+
					'			<div class="col-md-6">'+
					'				<label>Comisión GLC</label>'+
					'				<div class="form-group input-group">'+
					'					<span class="input-group-addon">$</span>'+
					'					<input name="' + id_tipo + '_t_glc" id="' + id_tipo + '_t_glc" type="text" onKeyPress="return tipoMontos(event)" placeholder="000,000.00" class="form-control">'+
					'				</div>'+
					'			</div>'+
					'		</div>'+
					'	</div>'+
					'</fieldset>'+
					'</div>'
				);	
			}

			$(id_f_inicio).datepicker({
				dateFormat: "dd/mm/yy",
				showAnim: "clip",
				onSelect: function() { 
					var d = $(this).datepicker('getDate');
					var dia = d.getDate();
					var mes = (d.getMonth()+1);
					var anyo = d.getFullYear();

					if(dia <= 9){ dia = "0"+dia; }
					if(mes <= 9){ mes = "0"+mes; }

					var date = dia + "" + mes + "" + anyo;

					array_codigo[id_tipo] = "CHT-"+date;
					if($("#codigo_charter").text() == "CHT-"){
						$("#codigo_charter").html("CHT-"+date);
						document.getElementById('id_charter').value = "CHT-"+date;	
					}
			    }
			});

			$(id_f_fin).datepicker({
				dateFormat: "dd/mm/yy",
				showAnim: "clip"
			});

			array_tipo.push(tipo_charter.value);
			
		}else{
			$("#"+id_tipo).remove();
			delete array_codigo[id_tipo]

			if(Object.keys(array_codigo).length > 0){
				$("#codigo_charter").html(array_codigo[Object.keys(array_codigo)]);
				document.getElementById('id_charter').value = array_codigo[Object.keys(array_codigo)];
			}else{
				$("#codigo_charter").html("CHT-");
				document.getElementById('id_charter').value = "CHT-";
			}
		}
	}

	function registrarCharter(){
		$("#form_registrar_charter").submit();
	}
</script>
@stop