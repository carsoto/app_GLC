<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>GLC | Galapagos Luxury Charters</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles_GLC.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/bootstrap.min.css") }}" />
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/dataTables.bootstrap.min.css") }}" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
</head>
<body>
	@yield('body')
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/jquery.dataTables.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/dataTables.bootstrap.min.js") }}" type="text/javascript"></script>

  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		    oTable = $('#table_charters').DataTable({
		        "processing": true,
		        "serverSide": true,
		        "ajax": "{{ route('datatable.charters') }}",
		        "language": {
		        	"url": "{{ asset('assets/scripts/es_datatables.json') }}"
				},
		        "columns": [
		            {data: 'codigo', name: 'codigo'},
		            {data: 'embarcacion_id', name: 'embarcacion_id'},
		            {data: 'f_inicio', name: 'f_inicio'},
		            {data: 'f_fin', name: 'f_fin'},
		            {data: 'nro_pax', name: 'nro_pax'},
		            {data: 'intermediarios_id', name: 'intermediarios_id'},
		            {data: 'deluxe', name: 'deluxe'},
		            {data: 'tarifa_contrato', name: 'tarifa_contrato'},
		            {data: 'action', name: 'action', orderable: false}
		            /*{data: null, sortable: false, searchable: false, defaultContent: '<a href="{{ url ('admin/charters/apa/ver_apa') }}"><i class="fa fa-money fa-fw" title="APA"></i></a> <a href="{{ url ('admin/charters/ver_charter/') }}'+$(this).id+'"><i class="fa fa-eye fa-fw" title="Ver"></i></a> <a href="{{ url ('admin/charters/editar_charter') }}"><i class="fa fa-edit fa-fw" title="Editar"></i></a> <a href="{{ url ('') }}"><i class="fa fa-file-pdf-o fa-fw" title="Contrato"></i></a>'}*/
		        ]
		    });
			
			oTable2 = $('#table_apas').DataTable({
		        "processing": true,
		        "serverSide": true,
		        "ajax": "{{ route('datatable.apas') }}",
		        "language": {
		        	"url": "{{ asset('assets/scripts/es_datatables.json') }}"
				},
		        "columns": [
		            {data: 'charter', name: 'charter'},
		            {data: 'cliente', name: 'cliente'},
		            {data: null,}, //ganancia
		            {data: null, sortable: false, searchable: false, defaultContent: '<a href="{{ url ('/admin/contabilidad/apa/editar_apa') }}"><i class="fa fa-edit fa-fw"></i></a> <a href="{{ url ('exportar_apa') }}"><i class="fa fa-print fa-fw"></i></a>'}
		        ]
		    });
		});
		
		function validarTexto(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true;
			patron =/[A-Za-z\s]/;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}

		function tipoNumeros(e){
			var key = window.event ? e.which : e.keyCode
			return (key >= 48 && key <= 57);
		}

		function tipoMontos(e){
			var key = window.event ? e.which : e.keyCode
			return (key >= 48 && key <= 57 || key == 46 || key == 44); // [46 -> (.)] [44 -> (,)]
		}

		var array_codigo = [];

		function seleccionar_tipo_charter(){
			var tipo_charter = event.target;
			var id_tipo_embarcacion = tipo_charter.getAttribute('idembarcacion');
			var array_tipo = [];
			var id_tipo = tipo_charter.value.replace(/\s/g,"_");
			var id_f_inicio = "#"+id_tipo+"_f_inicio";
			var id_f_fin = "#"+id_tipo+"_f_fin";
			////console.log(tipo_charter.checked);
			var datos_embarcacion = $('#datos_embarcacion').data('embarcacion');
            //console.log(datos_embarcacion);
            //var options_embarcacion = '<option value="0">Elija su embarcación</option>';
            var options_embarcacion = '';
            for (i = 0; i < datos_embarcacion.length; i++) {
            	if(datos_embarcacion[i]['tipo_embarcacion_id'] == id_tipo_embarcacion){
            		options_embarcacion += '<option value="' + datos_embarcacion[i]['id'] + '">' + datos_embarcacion[i]['nombre_embarcacion'] + '</option>';
            	}
			}
			
			//$("#tipo_charter_embaraccion").val(array_tipo.join());

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

						//array_codigo.push({id_tipo: "CHT-"+date});

						array_codigo[id_tipo] = "CHT-"+date;
						//console.log(array_codigo);
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
				//console.log(array_codigo);

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
</body>
</html>