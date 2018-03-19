@extends('layouts.dashboard')
@section('page_heading','Charters')
@section('section')
           
<a href="{{ url ('admin/charters/registrar') }}" class="btn btn-sm btn-success"><i class="fa fa-plus fa-fw"></i> Nuevo Charter</a>
<br><br>
<div class="row">
    <div class="col-sm-12">
	    <table id="table_charters" class="table table-hover table-condensed">
	        <thead>
	        <tr>
	            <th style="text-align: center;">CÓDIGO</th>
				<th style="text-align: center;">YATE</th>
				<th style="text-align: center;">INICIO</th>
				<th style="text-align: center;">FIN</th>
				<th style="text-align: center;"># PAX</th>
				<th style="text-align: center;">INTERMEDIARIO</th>
				<th style="text-align: center;">DELUXE</th>
				<th style="text-align: center;">TARIFA</th>
	            <th style="text-align: center;">ACCIONES</th>
	        </tr>
	        </thead>
	    </table>
	</div>
</div>
   
@stop

@section('scripts')
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
	        ]
	    });
	});
</script>
@stop
