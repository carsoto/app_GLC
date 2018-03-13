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
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",

					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},

					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
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
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",

					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},

					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				},

		        "columns": [
		            {data: 'charter', name: 'charter'},
		            {data: 'cliente', name: 'cliente'},
		             {data: null,}, //ganancia
		            {data: null, sortable: false, searchable: false, defaultContent: '<a href="{{ url ('/admin/contabilidad/apa/editar_apa') }}"><i class="fa fa-edit fa-fw"></i></a> <a href="{{ url ('exportar_apa') }}"><i class="fa fa-print fa-fw"></i></a>'}
		        ]
		    });
		});
	</script> 
</body>
</html>