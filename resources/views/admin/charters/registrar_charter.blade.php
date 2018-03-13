@extends('layouts.dashboard')
@section('page_heading','Registrar Charter')
@section('section')

<div class="col-lg-12">
<br />
    <form role="form">
        <fieldset>
        	<div class="row">
        		<div class="col-lg-12">
	        		<div class="form-group">
		                <label>Código Charter</label>
		                <p class="form-control-static">CHT-Nombre embarcación-fechaInicio</p>
	            	</div>
					<div class="form-group">
			            <label>Tipo de Charter</label>
			            <br>
			            <label class="radio-inline">
			                <input type="radio" name="tipo_charter" id="tipo_charter1" value="Yate Buceo" checked>Yate Buceo
			            </label>
			            <label class="radio-inline">
			                <input type="radio" name="tipo_charter" id="tipo_charter2" value="Yate Naturalista">Yate Naturalista
			            </label>
			            <label class="radio-inline">
			                <input type="radio" name="tipo_charter" id="tipo_charter3" value="Jet">Jet
			            </label>
			            <label class="radio-inline">
			                <input type="radio" name="tipo_charter" id="tipo_charter4" value="Avioneta">Avioneta
			            </label>
			            <label class="radio-inline">
			                <input type="radio" name="tipo_charter" id="tipo_charter5" value="Helicóptero">Helicóptero
			            </label>
			        </div>
		    	</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Embarcación</label>
						<select class="form-control">
							<option>Nombres de tipo de charter elegido</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-6">
						<label>F. Inicio</label>
					<div class="form-group">
						<div class='input-group date' id='f_inicio'>
							<input type='text' class="form-control" />
							<span class="input-group-addon">
								<span class="fa fa-calendar"></span>
							</span>
						</div>
					</div>
					</div>
					<div class="col-md-6">
						<label>F. Fin</label>
						<div class="form-group">
							<div class='input-group date' id='f_fin'>
								<input type='text' class="form-control" />
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<label>Cantidad de pasajeros</label>
					<div class="form-group">
						<input type="number" class="form-control">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Intermediario</label>
						<select class="form-control">
							<option>Nombres de intermediarios</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-4">
						<label>Adjuntar contrato</label>
						<div class="form-group">
							<input type="file">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<label>Deluxe</label>
					<div class="form-group">
						<label class="toggle">
							<input type="checkbox" checked>
							<span class="slider round"></span>
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<label>Tarifa</label>
					<div class="form-group input-group">
						<span class="input-group-addon">$</span>
						<input type="number" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-lg-12">
						<label>Itinerario</label>
						<select class="form-control">
							<option>Seleccionar itinerario</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<label>Lista de Pasajeros</label>
				<div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>NOMBRE</th>
								<th>EDAD</th>
								<th>CONDICION MEDICA</th>
								<th>CONTACTO EMERGENCIA</th>
								<th>ACCIÓN</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td><i class="fa fa-plus fa-fw"></i><i class="fa fa-minus fa-fw"></i></td>
							</tr>
							<tr>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td><i class="fa fa-plus fa-fw"></i><i class="fa fa-minus fa-fw"></i></td>
							</tr>
							<tr>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td><i class="fa fa-plus fa-fw"></i><i class="fa fa-minus fa-fw"></i></td>
							</tr>
						</tbody>
					</table>
				</div>	
			</div>
			<div class="row">
				<button class="btn btn-md btn-success">Registrar</button>
			</div>
        </fieldset>
    </form>
</div>

@stop