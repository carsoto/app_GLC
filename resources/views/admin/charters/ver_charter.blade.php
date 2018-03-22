@extends('layouts.dashboard')
@section('page_heading','Detalles Charter: '.$codigo)
@section('section')
<div class="col-lg-12">
	@foreach ($charter as $charter_details)
		<br><strong>Cliente:</strong> {{ $charter_details->cliente }}
		<br><strong>Intermediario:</strong> {{ $charter_details->intermediario->nombre }}
		<br><strong>Contrato:</strong> {{ $charter_details->contrato }}
		<br><strong>Costo:</strong> $ {{ number_format($charter_details->costo) }}
		<br>
	@endforeach
</div>
<br><br><br><br><br><br>
@foreach ($tipo_charter as $t_charter)
<?php $id = str_replace(" ", "_", $t_charter->embarcacion->nombre_embarcacion); ?>
<div class="col-lg-12">
	<div class="panel-group" id="accordion">
		<div class="panel panel-primary" id="panel{{ $id }}">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-target="#{{ $id }}" href="#{{ $id }}">{{ $t_charter->embarcacion->tipo_embarcacion->desc_tipo }} - {{ $t_charter->embarcacion->nombre_embarcacion }} <i class="fa fa-chevron-down fa-fw"></i>
					</a>
				</h4>
			</div>
			<div id="{{ $id }}" class="panel-collapse collapse out">
				<div class="panel-body">
					<strong>Inicia:</strong> {{ \Carbon\Carbon::parse($t_charter->f_inicio)->format('d/m/Y')}}
					<br><strong>Finaliza:</strong> {{ \Carbon\Carbon::parse($t_charter->f_fin)->format('d/m/Y')}}
					<br><strong>Cantidad de pasajeros:</strong> {{ $t_charter->nro_pax }}
					<br><strong>Deluxe:</strong> {{ $t_charter->deluxe }}
					<br><strong>Tarifa de contrato:</strong> {{ $t_charter->tarifa_contrato }}
					<br><strong>Tarifa neta:</strong> {{ $t_charter->tarifa_neta }}
					<br><strong>Comisión del intermediario:</strong> {{ $t_charter->comision_intermediario }}
					<br><strong>Comisión de GLC:</strong> {{ $t_charter->comision_glc }}
					<br><strong>Creado:</strong> {{ \Carbon\Carbon::parse($t_charter->created_at)->format('d/m/Y H:i:s')}}
					<br><strong>Actualizado:</strong> {{ \Carbon\Carbon::parse($t_charter->updated_at)->format('d/m/Y H:i:s')}}
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach

@stop