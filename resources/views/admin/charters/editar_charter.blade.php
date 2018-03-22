@extends('layouts.dashboard')
@section('page_heading','Editar Charter')
@section('section')

<div class="col-lg-12">
<br />
    <form role="form" id="form_actualizar_charter" action="{{ route('admin.charters.actualizar') }}" method="POST" enctype="multipart/form-data">
    	{{ csrf_field() }} 
        <fieldset>
			@foreach ($tipo_charter as $charter)
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
				</div>
				<div class="row">
					<div class="col-lg-12">
						<label>Lista de Pasajeros</label>
						<br>
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
								@if(count($lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo]) > 0)
									@for ($i = 0; $i < count($lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo]); $i++)
										<tr class="tr_clone">
											<td><input name="{{ $id_tipo_embarcacion }}_nombre_pasajero[]" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)"></td>
											<td><input name="{{ $id_tipo_embarcacion }}_edad[]" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control"></td>
											<td>
											<select name="{{ $id_tipo_embarcacion }}_condicion_medica[]" class="form-control select_condicion_medica" multiple="multiple">
												<option selected="selected">orange</option>
												<option>white</option>
												<option selected="selected">purple</option>
												</select>
											</td>
											<td><input name="{{ $id_tipo_embarcacion }}_nro_emergencia[]" type="text" onKeyPress="return numeroTelefono(event)" placeholder="+59399999999" class="form-control"></td>
											<td>
												<select name="{{ $id_tipo_embarcacion }}_parentesco[]" class="form-control select_parentescos">
													@foreach ($parentescos as $parentesco)
														<option value="{{ $parentesco->descripcion }}">{{ $parentesco->descripcion }}</option>
													@endforeach
												</select>
											</td>
											<td>
												<button type="button" class="btn btn-success btn-circle tr_clone_add" name="add"><i class="fa fa-plus fa-fw"></i></button>
												<button type="button" class="btn btn-danger btn-circle tr_remove" name="remove" idtabla="{{ $id_tipo_embarcacion }}_detalles_pasajeros"><i class="fa fa-minus fa-fw"></i></button>
											</td>
										</tr>
									@endfor
								@else
									<tr class="tr_clone">
										<td><input name="{{ $id_tipo_embarcacion }}_nombre_pasajero[]" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)"></td>
										<td><input name="{{ $id_tipo_embarcacion }}_edad[]" type="text" onKeyPress="return tipoNumeros(event)" placeholder="0" class="form-control"></td>
										<td>
										<select name="{{ $id_tipo_embarcacion }}_condicion_medica[]" class="form-control select_condicion_medica" multiple="multiple">
											<option selected="selected">orange</option>
											<option>white</option>
											<option selected="selected">purple</option>
											</select>
										</td>
										<td><input name="{{ $id_tipo_embarcacion }}_nro_emergencia[]" type="text" onKeyPress="return numeroTelefono(event)" placeholder="+59399999999" class="form-control"></td>
										<td>
											<select name="{{ $id_tipo_embarcacion }}_parentesco[]" class="form-control select_parentescos">
												@foreach ($parentescos as $parentesco)
													<option value="{{ $parentesco->descripcion }}">{{ $parentesco->descripcion }}</option>
												@endforeach
											</select>
										</td>
										<td>
											<button type="button" class="btn btn-success btn-circle tr_clone_add" name="add"><i class="fa fa-plus fa-fw"></i></button>
											<button type="button" class="btn btn-danger btn-circle tr_remove" name="remove" idtabla="{{ $id_tipo_embarcacion }}_detalles_pasajeros"><i class="fa fa-minus fa-fw"></i></button>
										</td>
									</tr>
								@endif
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
	
	$('.select_parentescos').select2({
		width: '200px',
		tags: true
	});

	$('.select_condicion_medica').select2({
		width: '200px',
		tags: true,
		tokenSeparators: [',', ',']
	});
	
	$("table").on('click','.tr_clone_add' ,function() {
		$('.select_condicion_medica').select2("destroy"); 
		$('.select_parentescos').select2("destroy"); 

		var $tr = $(this).closest('.tr_clone');
		var $clone = $tr.clone();

		$tr.after($clone);

		$('.select_condicion_medica').select2({
			width: '150px',
			tags: true,
			tokenSeparators: [',', ',']
		});

		$('.select_parentescos').select2({
			width: '200px',
			tags: true
		});

		$clone.find('.select_condicion_medica').select2('val', '');
	});

	$("table").on('click','.tr_remove', function() {
		var tabla = $(this).attr("idtabla");
		var numeroFilas = $("#" + tabla + " tr").length;
		if(numeroFilas > 2){
			$(this).closest('tr').remove();
		}
	});
</script>
@stop