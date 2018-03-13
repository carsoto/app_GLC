@extends('layouts.dashboard')
@section('page_heading','Factura GLC')
@section('section')

<div class="col-md-6 col-md-offset-3">
<br />
    <form role="form">
        <fieldset>
        	<div class="form-group">
			    <label># Invoice</label>
			    <label>bbdd</label>
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
			    <label>Salesperson</label>
			    <input class="form-control" placeholder="Enter text">
			</div>
			<div class="form-group">
			    <label>Client</label>
			    <input class="form-control" placeholder="Enter text">
			</div>
			<div class="form-group">
			    <label>Servicios</label>
			    <select class="form-control">
					<option>Actividades</option>
					<option>Comida</option>
					<option>Bebidas</option>
			    </select>
			</div>
			<div class="form-group">
				<label>Quantity</label>
			    <input type="number" class="form-control">
			</div>
			<div class="form-group">
			    <label>Description</label>
			    <textarea class="form-control" rows="3"></textarea>
			</div>
			<label>Unit Price</label>
			<div>
			<div class="form-group input-group">
			    <span class="input-group-addon">$</span>
			    <input type="number" class="form-control">
			</div>

			<div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">Asociar a un APA
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Charter</label>
                <select class="form-control">
                    <option>CH060318-1</option>
                    <option>CH060318-2</option>
                    <option>CH060318-3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Cliente</label>
                <select class="form-control">
                    <option>Cliente 1</option>
                    <option>Cliente 2</option>
                    <option>Cliente 3</option>
                </select>
            </div>
		</fieldset>
		<a href="{{ url ('') }}" class="btn btn-lg btn-success btn-block">Generar</a>
	</form>
</div>     
@stop
