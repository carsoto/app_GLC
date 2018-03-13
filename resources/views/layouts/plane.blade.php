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
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/dataTables.bootstrap.min.css") }}" />
</head>
<body>
	@yield('body')

	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/jquery.dataTables.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/dataTables.bootstrap.min.js") }}" type="text/javascript"></script>
	
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
		            {data: 'yate', name: 'yate'},
		            {data: 'f_inicio', name: 'f_inicio'},
		            {data: 'f_fin', name: 'f_fin'},
		            {data: 'nro_pax', name: 'nro_pax'},
		            {data: 'intermediario', name: 'intermediario'},
		            {data: 'deluxe', name: 'deluxe'},
		            {data: 'tarifa', name: 'tarifa'},
		            {data: null, sortable: false, searchable: false, defaultContent: '<a href="{{ url ('admin/charters/apa/ver_apa') }}"><i class="fa fa-money fa-fw" title="APA"></i></a> <a href="{{ url ('admin/charters/ver_charter') }}"><i class="fa fa-eye fa-fw" title="Ver"></i></a> <a href="{{ url ('admin/charters/editar_charter') }}"><i class="fa fa-edit fa-fw" title="Editar"></i></a> <a href="{{ url ('') }}"><i class="fa fa-print fa-fw" title="Imprimir"></i></a> <a href="{{ url ('') }}"><i class="fa fa-file-pdf-o fa-fw" title="Contrato"></i></a>'}
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

		function seleccionar_tipo_charter(){
			var tipo_charter = event.target;
			var array_tipo = [];
			var id_tipo = tipo_charter.value.replace(/\s/g,"_");
			//console.log(tipo_charter.checked);
			
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
						'				<select id="' + id_tipo + '_embarcacion" class="form-control">'+
						'					<option>Nombres de tipo de charter elegido</option>'+
						'				</select>'+
						'			</div>'+
						'		</div>'+
						'		<div class="col-md-2">'+
						'			<label>Cant. de pasajeros</label>'+
						'			<div class="form-group">'+
						'				<input  id="' + id_tipo + '_c_pasajeros" type="number" class="form-control">'+
						'			</div>'+
						'		</div>'+
						'		<div class="col-md-6">'+
						'			<div class="col-md-6">'+
						'				<label>F. Inicio</label>'+
						'			<div class="form-group">'+
						'				<div class="input-group date" id="f_inicio">'+
						'					<input id="' + id_tipo + '_f_inicio" type="text" class="form-control" />'+
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
						'						<input id="' + id_tipo + '_f_fin" type="text" class="form-control" />'+
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
						'					<input id="' + id_tipo + '_deluxe" type="checkbox" checked>'+
						'					<span class="slider round"></span>'+
						'				</label>'+
						'			</div>'+
						'		</div>'+
						'		<div class="col-md-2">'+
						'			<label>Tarifa de contrato</label>'+
						'			<div class="form-group input-group">'+
						'				<span class="input-group-addon">$</span>'+
						'				<input id="' + id_tipo + '_t_contrato" type="number" class="form-control">'+
						'			</div>'+
						'		</div>'+
						'		<div class="col-md-2">'+
						'			<label>Tarifa neta</label>'+
						'			<div class="form-group input-group">'+
						'				<span class="input-group-addon">$</span>'+
						'				<input id="' + id_tipo + '_t_neta" type="number" class="form-control">'+
						'			</div>'+
						'		</div>'+
						'		<div class="col-md-6">'+
						'			<div class="col-md-6">'+
						'				<label>Comisión intermediario</label>'+
						'				<div class="form-group input-group">'+
						'					<span class="input-group-addon">$</span>'+
						'					<input id="' + id_tipo + '_t_interm" type="number" class="form-control">'+
						'				</div>'+
						'			</div>'+
						'			<div class="col-md-6">'+
						'				<label>Comisión GLC</label>'+
						'				<div class="form-group input-group">'+
						'					<span class="input-group-addon">$</span>'+
						'					<input id="' + id_tipo + '_t_glc" type="number" class="form-control">'+
						'				</div>'+
						'			</div>'+
						'		</div>'+
						'	</div>'+
						'</fieldset>'+
						'</div>'
					);	
				}
				array_tipo.push(tipo_charter.value);
			}else{
				$("#"+id_tipo).remove();
			}
		}
	</script> 
</body>
</html>