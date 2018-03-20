@extends('layouts.dashboard')
@section('page_heading','Editar Charter')
@section('section')

<div class="col-lg-12">
<br />
    <form role="form" id="form_actualizar_charter" action="{{ route('admin.charters.actualizar') }}" method="POST" enctype="multipart/form-data">
    	{{ csrf_field() }} 
        <fieldset>
			@foreach ($charters as $charter)
				<h3>{{ $charter->embarcacion->tipo_embarcacion->desc_tipo }}: {{ $charter->embarcacion->nombre_embarcacion }}</h3>
				<?php $id_tipo_embarcacion = str_replace(' ','_',$charter->embarcacion->tipo_embarcacion->desc_tipo); ?>
				<hr> 
				<div class="row">
					<div class="col-md-6">
						<label>F. Inicio</label>
						<div class="form-group">
							<div class="input-group date" id="f_inicio">
								<input name="{{ $id_tipo_embarcacion }}_f_inicio" id="{{ $id_tipo_embarcacion }}_f_inicio" type="text" placeholder="dd/mm/yyyy" class="form-control datepicker" value="{{ \Carbon\Carbon::parse($charter->f_inicio)->format('d/m/Y')}}"/>
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<label>F. Fin</label>
						<div class="form-group">
							<div class="input-group date" id="f_fin">
								<input name="{{ $id_tipo_embarcacion }}_f_fin" id="{{ $id_tipo_embarcacion }}_f_fin" type="text" placeholder="dd/mm/yyyy" class="form-control datepicker" value="{{ \Carbon\Carbon::parse($charter->f_fin)->format('d/m/Y')}}"/>
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<!--<div class="col-md-2">
						<label>Cant. de pasajeros</label>
						<div class="form-group">
							<input name="{{ $id_tipo_embarcacion }}_c_pasajeros" id="{{ $id_tipo_embarcacion }}_c_pasajeros" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control" value="{{ $charter->nro_pax }}">
						</div>
					</div>-->
				</div>
				<div class="row">
					<div class="col-lg-12">
						<label>Lista de Pasajeros</label>
						<br>
						<button type="button" onclick="agregar_pasajero('{{ $id_tipo_embarcacion }}');" class="btn btn-sm btn-success"><i class="fa fa-plus fa-fw"></i> Nuevo pasajero</button>
						<br><br>
						<table class="table table-bordered" id="{{ $id_tipo_embarcacion }}_detalles_pasajeros">
							<thead>
								<tr>
									<th>Nombre y Apellido</th>
									<th>Edad</th>
									<th>Condición médica</th>
									<th>Contacto de emergencia</th>
									<th>Parentesco</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								@for ($i = 0; $i < $charter->nro_pax; $i++)
									@if(count($lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo]) > 0)

										@if (isset($lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo][$i]))
											<tr>
												<td><input name="nombre_pasajero[]" id="nombre_pasajero[]" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)" value="{{ $lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo][$i]->nombre }}"></td>
												<td><input name="{{ $id_tipo_embarcacion }}_edad[]" id="{{ $id_tipo_embarcacion }}_edad[]" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control" value="{{ $lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo][$i]->edad }}"></td>
												<td><input name="condicion_medica[]" id="condicion_medica[]" class="form-control" placeholder="Condición médica" onKeyPress="return validarTexto(event)" value="{{ $lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo][$i]->condicion_medica }}"></td>
												<td><input name="{{ $id_tipo_embarcacion }}_nro_emergencia[]" id="{{ $id_tipo_embarcacion }}_nro_emergencia[]" type="text" onKeyPress="return numeroTelefono(event)" placeholder="+59399999999" class="form-control" value="{{ $lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo][$i]->contacto_emergcencia }}"></td>
												<td>
													<select name="{{ $id_tipo_embarcacion }}_parentesco[]" class="form-control">
														@foreach ($parentescos as $parentesco)
															@if ($parentesco == $lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo][$i]->parentesco_contacto)
																<option value="{{ $parentesco }}" selected>{{ $parentesco }}</option>
															@else
																<option value="{{ $parentesco }}">{{ $parentesco }}</option>
															@endif
														@endforeach
								                	</select>
								            	</td>
												<td style="text-align: center;"><button type="button" onclick="eliminar_pasajero('{{ $id_tipo_embarcacion }}');" class="btn btn-danger btn-circle eliminalinea"><i class="fa fa-minus fa-fw"></i></button></td>
											</tr>
										@else
											<tr>
								            	<td><input name="nombre_pasajero[]" id="nombre_pasajero[]" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)"></td>
												<td><input name="{{ $id_tipo_embarcacion }}_edad[]" id="{{ $id_tipo_embarcacion }}_edad[]" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control"></td>
												<td><input name="condicion_medica[]" id="condicion_medica[]" class="form-control" placeholder="Condición médica" onKeyPress="return validarTexto(event)"></td>
												<td><input name="{{ $id_tipo_embarcacion }}_nro_emergencia[]" id="{{ $id_tipo_embarcacion }}_nro_emergencia[]" type="text" onKeyPress="return numeroTelefono(event)" placeholder="+59399999999" class="form-control"></td>
												<td>
													<select name="{{ $id_tipo_embarcacion }}_parentesco[]" class="form-control">
														@foreach ($parentescos as $parentesco)
															<option value="{{ $parentesco }}">{{ $parentesco }}</option>
														@endforeach
								                	</select>
								            	</td>
												<td style="text-align: center;"><button type="button" onclick="eliminar_pasajero('{{ $id_tipo_embarcacion }}');" class="btn btn-danger btn-circle eliminalinea"><i class="fa fa-minus fa-fw"></i></button></td>
											</tr>
										@endif
									@else
										<tr>
											<td><input name="{{ $id_tipo_embarcacion }}_nombre_pasajero[]" id="nombre_pasajero[]" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)"></td>
											<td><input name="{{ $id_tipo_embarcacion }}_edad[]" id="{{ $id_tipo_embarcacion }}_edad[]" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control"></td>
											<td><input name="{{ $id_tipo_embarcacion }}_condicion_medica[]" id="condicion_medica[]" class="form-control" placeholder="Condición médica" onKeyPress="return validarTexto(event)"></td>
											<td><input name="{{ $id_tipo_embarcacion }}_nro_emergencia[]" id="{{ $id_tipo_embarcacion }}_nro_emergencia[]" type="text" onKeyPress="return numeroTelefono(event)" placeholder="+59399999999" class="form-control"></td>
											<td>
												<select name="{{ $id_tipo_embarcacion }}_parentesco[]" class="form-control">
													@foreach ($parentescos as $parentesco)
														<option value="{{ $parentesco }}">{{ $parentesco }}</option>
													@endforeach
							                	</select>
							            	</td>
											<td style="text-align: center;"><button type="button" onclick="eliminar_pasajero('{{ $id_tipo_embarcacion }}');" class="btn btn-danger btn-circle eliminalinea"><i class="fa fa-minus fa-fw"></i></button></td>
										</tr>
									@endif
									
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
@section('scripts')
<script type="text/javascript">
	
	$(".datepicker").datepicker({
		dateFormat: "dd/mm/yy",
		showAnim: "clip"
	});
	
	function agregar_pasajero(tipo){
		var clonarfila= $("#" + tipo + "_detalles_pasajeros").find("tbody tr:last").clone().find("input:text").val("").end();
		$("#" + tipo + "_detalles_pasajeros tbody").append(clonarfila);
	}

	function eliminar_pasajero(tipo) {
		$("#" + tipo + "_detalles_pasajeros").on('click', '.eliminalinea', function () {
			var numeroFilas = $("#" + tipo + "_detalles_pasajeros tr").length;
			if(numeroFilas > 2){
				$(this).closest('tr').remove();
			}
		});
	}

	
</script>
@stop