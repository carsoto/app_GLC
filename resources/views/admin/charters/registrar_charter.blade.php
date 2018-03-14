@extends('layouts.dashboard')
@section('page_heading','Registrar Charter')
@section('section')

<div class="col-lg-12">
<br />
    <form role="form" id="form_registrar_charter" action="{{ route('admin.charters.nuevo_charter') }}" method="POST" enctype="multipart/form-data">
    	{{ csrf_field() }} 
        <fieldset>
        	<div class="row">
    			<div class="col-md-4">
	        		<div class="form-group">
		                <label>Código Charter</label>
		                <p class="form-control-static"><span name='codigo_charter' id='codigo_charter'>CHT-</span></p>
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
			        <label>Cliente</label>
					<div class="form-group">
		                <input name="cliente" class="form-control" placeholder="Nombre y apellido" onKeyPress="return validarTexto(event)">
		            </div>
		        </div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Intermediario</label>
						<select name="intermediario_id" class="form-control">
							<option value="0">Nombres de intermediarios</option>
							<option value="1">Carmen Soto</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-4">
						<label>Adjuntar contrato</label>
						<div class="form-group">
							<input name="archivo_contrato" type="file">
						</div>
					</div>
				</div>
			</div>

			<div id="contenido_tipo_charter"> </div>
			
			</div>
			<div class="row">
				<div class="col-lg-12" style="text-align: center;">
					<input type="submit" class="btn btn-md btn-success" value="Registrar Charter"></input>
				</div>
			</div>
        </fieldset>
    </form>
</div>
@stop