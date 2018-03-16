@extends('layouts.dashboard')
@section('page_heading','Detalles')
@section('section')
<div class="col-md-6 col-md-offset-3">
	<table class="table table-striped">
		<thead>
			<tr>
				<th colspan="2"><h3>CHARTER: {{ $charter->codigo }}</h3></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style='width: 250px; text-align: right;'>Cliente:</td>
				<td>{{ $charter->cliente }}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Inicia:</td>
				<td>{{ \Carbon\Carbon::parse($charter->f_inicio)->format('d/m/Y')}}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Finaliza:</td>
				<td>{{ \Carbon\Carbon::parse($charter->f_fin)->format('d/m/Y')}}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Intermediario</td> :     
				<td>{{ $charter->intermediario->nombre }}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Cantidad de pasajeros:</td>
				<td>{{ $charter->nro_pax }}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Deluxe:</td>
				<td>{{ $charter->deluxe }}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Contrato:</td>
				<td><a href="">{{ $charter->contrato }}</a></td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Tarifa de contrato:</td>
				<td>{{ $charter->tarifa_contrato }}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Tarifa neta:</td>
				<td>{{ $charter->tarifa_neta }}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Comisión del intermediario:</td>
				<td>{{ $charter->comision_intermediario }}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Comisión de GLC:</td>
				<td>{{ $charter->comision_glc }}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Embarcación:</td>
				<td>{{ $charter->embarcacion->nombre_embarcacion }}  </td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Creado:</td>
				<td>{{ \Carbon\Carbon::parse($charter->created_at)->format('d/m/Y H:i:s')}}</td>
			</tr>
			<tr>
				<td style='width: 250px; text-align: right;'>Actualizado:</td>
				<td>{{ \Carbon\Carbon::parse($charter->updated_at)->format('d/m/Y H:i:s')}}</td>
			</tr>
		</tbody>
	</table>
	<div class="row">
		<div class="col-lg-12" style="text-align: center;">
			<button onclick="window.history.back();" class="btn btn-md btn-info"><i class="fa fa-reply-all fa-fw"></i> Regresar</button>
		</div>
	</div>
</div>
@stop