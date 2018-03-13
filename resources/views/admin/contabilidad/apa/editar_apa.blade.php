@extends('layouts.dashboard')
@section('page_heading','Editar APA')
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
            
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SERVICIO / ACTIVIDAD</th>
                    <th>INVOICE LINK</th>
                    <th>TOTAL (MONTO)</th>
                    <th>VALOR NETO</th>
                    <th>PAPELETA DE PAGO</th>
                    <th>COMISIÓN</th>
                    <th>ESTATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>buceo</td>
                    <td>gfjhdshfsdf</td>
                    <td>15000</td>
                    <td>10000</td>
                    <td>sdfdsgfdgdf</td>
                    <td>5000</td>
                    <td><label class="success">Pagado</label></td>
                </tr>
                <tr>
                    <td>buceo</td>
                    <td>gfjhdshfsdf</td>
                    <td>15000</td>
                    <td>10000</td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-warning">Editar solo montos</button><button class="btn btn-info">Pagar</button></td>
                </tr>
            </tbody>
        </table>    
            <!-- Change this to a button or input when using this as a form 
            <a href="{{ url ('') }}" class="btn btn-lg btn-info btn-block">Editar</a>-->
        </fieldset>
    </form>
</div>           
            
@stop
