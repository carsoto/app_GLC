@extends('layouts.dashboard')
@section('page_heading','Charters')
@section('section')
           
<a href="{{ url ('admin/charters/registrar_charter') }}" class="btn btn-sm btn-success"><i class="fa fa-plus fa-fw"></i> Nuevo Charter</a>
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

