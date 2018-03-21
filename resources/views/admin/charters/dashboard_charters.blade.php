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
	            <th style="text-align: center;">TIPO</th>
	            <th style="text-align: center;">INTERMEDIARIO</th>
				<th style="text-align: center;">CLIENTE</th>
				<th style="text-align: center;">COSTO</th>
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
	            {data: 'tipo_charter', name: 'tipo_charter'},
	            {data: 'nombre', name: 'intermediarios.nombre'},
	            {data: 'cliente', name: 'cliente'},
	            {data: 'costo', name: 'costo'},
	            {data: 'action', name: 'action', orderable: false}
	        ]
	    });
	});
</script>
@stop
