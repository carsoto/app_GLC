@extends('layouts.dashboard')
@section('page_heading','Registrar Charter')
@section('section')

<div class="col-lg-12">
<br />
    <form role="form">
        <fieldset>
        	<div class="row">
    			<div class="col-md-4">
	        		<div class="form-group">
		                <label>Código Charter</label>
		                <p class="form-control-static">CHT-fechaInicio</p>
	            	</div>
	            </div>
            	<div class="col-md-4">
					<div class="form-group">
			            <label>Tipo de Charter</label>
			            <br>
			            <label class="checkbox-inline">
			                <input type="checkbox" name="tipo_charter" id="tipo_charter1" onclick="seleccionar_tipo_charter()" value="Yate Buceo">Yate Buceo
			            </label>
			            <label class="checkbox-inline">
			                <input type="checkbox" name="tipo_charter" id="tipo_charter2" onclick="seleccionar_tipo_charter()" value="Yate Naturalista">Yate Naturalista
			            </label>
			        </div>
			    </div>
		        <div class="col-md-4">
			        <label>Nombre del cliente</label>
					<div class="form-group">
		                <input class="form-control" placeholder="Enter text">
		            </div>
		        </div>
			</div>
			<div class="row">
				<div class="col-md-6">
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
			<div id="contenido_tipo_charter">
				
			</div>
			<!--<div class="row">
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
					<label>Tarifa de contrato</label>
					<div class="form-group input-group">
						<span class="input-group-addon">$</span>
						<input type="number" class="form-control">
					</div>
				</div>
				<div class="col-md-3">
					<label>Tarifa neta</label>
					<div class="form-group input-group">
						<span class="input-group-addon">$</span>
						<input type="number" class="form-control">
					</div>
				</div>
				<div class="col-md-3">
					<label>Comisión intermediario</label>
					<div class="form-group input-group">
						<span class="input-group-addon">$</span>
						<input type="number" class="form-control">
					</div>
				</div>-->
			</div>
			<div class="row">
				<div class="col-lg-12" style="text-align: center;">
					<button class="btn btn-md btn-success">Registrar</button>
				</div>
			</div>
        </fieldset>
    </form>
</div>
@stop