@extends('layouts.dashboard')
@section('page_heading','Detalles Charter: '.$codigo)
@section('section')

@foreach ($charter as $charter_details)

<br>Cliente: {{ $charter_details->cliente }}
<br>Intermediario: {{ $charter_details->intermediario->nombre }}
<br>Contrato: {{ $charter_details->contrato }}
<br>Costo: {{ $charter_details->costo }}
<br>
@endforeach

<div class="panel-group" id="accordion">
    <div class="panel panel-default" id="panel1">
        <div class="panel-heading">
             <h4 class="panel-title">
        <a data-toggle="collapse" data-target="#collapseOne" 
           href="#collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>

        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
        </div>
    </div>

<div class="col-md-6 col-md-offset-3">
	@foreach ($tipo_charter as $t_charter)
		<table class="table table-striped">
			<thead>
				<tr>
					<th colspan="2"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style='width: 250px; text-align: right;'>Embarcación:</td>
					<td>{{ $t_charter->embarcacion->tipo_embarcacion->desc_tipo }} - {{ $t_charter->embarcacion->nombre_embarcacion }}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Inicia:</td>
					<td>{{ \Carbon\Carbon::parse($t_charter->f_inicio)->format('d/m/Y')}}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Finaliza:</td>
					<td>{{ \Carbon\Carbon::parse($t_charter->f_fin)->format('d/m/Y')}}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Cantidad de pasajeros:</td>
					<td>{{ $t_charter->nro_pax }}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Deluxe:</td>
					<td>{{ $t_charter->deluxe }}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Tarifa de contrato:</td>
					<td>{{ $t_charter->tarifa_contrato }}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Tarifa neta:</td>
					<td>{{ $t_charter->tarifa_neta }}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Comisión del intermediario:</td>
					<td>{{ $t_charter->comision_intermediario }}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Comisión de GLC:</td>
					<td>{{ $t_charter->comision_glc }}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Creado:</td>
					<td>{{ \Carbon\Carbon::parse($t_charter->created_at)->format('d/m/Y H:i:s')}}</td>
				</tr>
				<tr>
					<td style='width: 250px; text-align: right;'>Actualizado:</td>
					<td>{{ \Carbon\Carbon::parse($t_charter->updated_at)->format('d/m/Y H:i:s')}}</td>
				</tr>
			
			</tbody>
		</table>
	@endforeach
	<div class="row">
		<div class="col-lg-12" style="text-align: center;">
			<button onclick="window.history.back();" class="btn btn-md btn-info"><i class="fa fa-reply-all fa-fw"></i> Regresar</button>
		</div>
	</div>
</div>
@stop