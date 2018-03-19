@extends('layouts.dashboard')
@section('page_heading','Editar Charter')
@section('section')

<div class="col-lg-12">
<br />
    <form role="form" id="form_actualizar_charter" action="{{ route('admin.charters.actualizar') }}" method="POST" enctype="multipart/form-data">
    	{{ csrf_field() }} 
        <fieldset>
			@foreach ($charters as $charter)
				<!--<table class="table table-striped">
					<thead>
						<tr>
							<th colspan="2"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style='width: 250px; text-align: right;'>Inicia:</td>
							<td>{{ \Carbon\Carbon::parse($charter->f_inicio)->format('d/m/Y')}}</td>
						</tr>
						<tr>
							<td style='width: 250px; text-align: right;'>Finaliza:</td>
							<td>{{ \Carbon\Carbon::parse($charter->f_fin)->format('d/m/Y')}}</td>
						</tr>
						<tr>
							<td style='width: 250px; text-align: right;'>Cantidad de pasajeros:</td>
							<td>{{ $charter->nro_pax }}</td>
						</tr>
					</tbody>
				</table>-->
				<h3>{{ $charter->embarcacion->tipo_embarcacion->desc_tipo }}: {{ $charter->embarcacion->nombre_embarcacion }}</h3>
				<hr> 
				<div class="row">
					<div class="col-md-5">
						<label>F. Inicio</label>
						<div class="form-group">
							<div class="input-group date" id="f_inicio">
								<input name="' + id_tipo + '_f_inicio" id="' + id_tipo + '_f_inicio" type="text" placeholder="dd/mm/yyyy" class="form-control" value="{{ \Carbon\Carbon::parse($charter->f_inicio)->format('d/m/Y')}}"/>
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<label>F. Fin</label>
						<div class="form-group">
							<div class="input-group date" id="f_fin">
								<input name="' + id_tipo + '_f_fin" id="' + id_tipo + '_f_fin" type="text" placeholder="dd/mm/yyyy" class="form-control" value="{{ \Carbon\Carbon::parse($charter->f_fin)->format('d/m/Y')}}"/>
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<label>Cant. de pasajeros</label>
						<div class="form-group">
							<input name="' + id_tipo + '_c_pasajeros" id="' + id_tipo + '_c_pasajeros" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control" value="{{ $charter->nro_pax }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<label>Lista de Pasajeros</label>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Edad</th>
									<th>Condición Médica</th>
									<th>Contacto de Emergencia</th>
									<th>Parentesco</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								@for ($i = 0; $i < $charter->nro_pax; $i++)
									<tr>
										<td><input name="cliente" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)"></td>
										<td><input name="' + id_tipo + '_c_pasajeros" id="' + id_tipo + '_c_pasajeros" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control"></td>
										<td><input name="cliente" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)"></td>
										<td><input name="' + id_tipo + '_c_pasajeros" id="' + id_tipo + '_c_pasajeros" type="text" onKeyPress="return numeroTelefono(event)" placeholder="0" class="form-control"></td>
										<td>
											<select class="form-control">
												@foreach ($parentescos as $parentesco)
													<option value="{{ $parentesco }}">{{ $parentesco }}</option>
												@endforeach
						                	</select>
						            	</td>
										<td>-</td>
									</tr>
								@endfor
							</tbody>
						</table>
					</div>
				</div>
				<!-- Detalles de Actividades -->
				<div class="row">
					<div class="col-lg-12">
						<label>Detalles de Actividades</label>
						<!--<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Edad</th>
									<th>Condición Médica</th>
									<th>Contacto de Emergencia</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>-->
					</div>
				</div>
			@endforeach
			<div class="row">
				<div class="col-md-6" style="text-align: center;">
					<button type="button" onclick="window.history.back();" class="btn btn-md btn-info"><i class="fa fa-reply-all fa-fw"></i> Regresar</button>
				</div>
				<div class="col-md-6" style="text-align: center;">
					<input type="submit" class="btn btn-md btn-success" value="Editar Charter"></input>
				</div>
			</div>
        </fieldset>
    </form>
</div>    
            
@stop
