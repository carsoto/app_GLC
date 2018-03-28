@extends('layouts.dashboard')
@section('page_heading','Yates')
@section('section')
           
<a href="{{ url ('admin/yates/create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus fa-fw"></i> Nuevo Yate</a>
<br><br>
<div class="row">
    <div class="col-sm-12">
	    <table id="table_yates" class="table table-hover table-condensed">
	        <thead>
	        <tr>
				<th style="text-align: center;">NOMBRE</th>
				<th style="text-align: center;">CAPACIDAD</th>
				<th style="text-align: center;">PUERTO DE REG.</th>
				<th style="text-align: center;">COMPAÑÍA</th>
				<th style="text-align: center;">MODELO</th>
				<th style="text-align: center;">PATENTE</th>
				<th style="text-align: center;">ACCIÓN</th>
	        </tr>
	        </thead>
	    </table>
	</div>
</div>
   
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    oTable3 = $('#table_yates').DataTable({
	        "processing": true,
	        "serverSide": true,
	        "ajax": "{{ route('datatable.yates') }}",
	        "language": {
	        	"url": "{{ asset('assets/scripts/es_datatables.json') }}"
			},
	        "columns": [
	            {data: 'nombre', name: 'nombre'},
	            {data: 'capacidad', name: 'capacidad'},
	            {data: 'puerto', name: 'puerto_registro.descripcion'},
	            {data: 'razon_social', name: 'companias_yate.razon_social'},
	            {data: 'modelo', name: 'modelos_yate.descripcion'},
	            {data: 'patente', name: 'tipos_patente.descripcion'},
	            {data: 'action', name: 'action', orderable: false}
	        ]
	    });
	});
</script>
@stop
