@extends ('layouts.dashboard')
@section('page_heading','Registrar APA')

@section('section')
<div class="col-md-6 col-md-offset-3">
<br />
    <form role="form">
        <fieldset>
        	<div class="form-group">
                <label>Charter</label>
                <select class="form-control">
                    <option>CH060318-1</option>
                    <option>CH060318-2</option>
                    <option>CH060318-3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tipo de Factura</label>
                <select class="form-control">
                    <option>Cliente</option>
                    <option>Operativo</option>
                </select>
            </div>
            <label>Date</label>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker8'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="fa fa-calendar">
                        </span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label>Servicios</label>
                <select class="form-control">
					<option>Deluxe Activities (GLC)</option>
                    <option>Extra Activities</option>
					<option>Food</option>
					<option>Alcoholic Beverages</option>
                </select>
            </div>
            
            ## Opcional de acuerdo a la selección anterior
            <div class="form-group">
                <label>Actividad</label>
                <select class="form-control">
					<option>CATCH AND RELEASE FISHING</option>
					<option>SATURDAY DIVING</option>
					<option>SUNDAY SEA FARIS</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nombre de la factura</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <label>Monto</label>
            <div>
            <div class="form-group input-group">
                <span class="input-group-addon">$</span>
                <input type="number" class="form-control">
            </div>
            <div class="form-group">
                <label>Cargar factura</label>
                <input type="file">
            </div>
            <!-- Change this to a button or input when using this as a form -->
            <a href="{{ url ('') }}" class="btn btn-lg btn-info btn-block">Cargar</a>
        </fieldset>
    </form>
</div>

@stop


