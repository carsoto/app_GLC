@extends('layouts.dashboard')
@section('page_heading','Registrar Charter')
@section('section')

<div class="col-lg-12">
<br />
    <form role="form" id="form_registrar_charter" action="{{ route('admin.charters.nuevo') }}" method="POST" enctype="multipart/form-data">
    	{{ csrf_field() }} 
    	<input type="hidden" id="datos_embarcacion" data-embarcacion="{{ $embarcacion }}">
        <fieldset>
        	<div class="row">
    			<div class="col-md-4">
	        		<div class="form-group">
		                <label>Código Charter</label>
		                <input type="hidden" name="id_charter" id="id_charter">
		                <p class="form-control-static"><span name='codigo_charter' id='codigo_charter'>CHT-</span></p>
	            	</div>
	            </div>
            	<div class="col-md-4">
					<div class="form-group">
			            <label>Tipo de Charter</label>
			            <br>
			            <input type="hidden" id="tipo_charter_embaraccion">
			            @foreach ($tipo_embarcacion as $tipo)
			            	<label class="checkbox-inline">
			                	<input type="checkbox" name="tipo_charter[]" id="tipo_charter{{ $tipo->id }}" onclick="seleccionar_tipo_charter()" value="{{ $tipo->desc_tipo }}" idembarcacion="{{ $tipo->id }}">{{ $tipo->desc_tipo }}
			            	</label>
						@endforeach
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
							@foreach ($intermediarios as $intermediario)
							<option value="{{ $intermediario->id }}">{{ $intermediario->nombre }}</option>
							@endforeach
							
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-4">
						<label>Adjuntar contrato</label>
						<div class="form-group">
							<input type="hidden" name="max_file_size" value="4194304" />
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