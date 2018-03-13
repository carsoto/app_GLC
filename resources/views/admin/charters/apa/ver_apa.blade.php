@extends('layouts.dashboard')
@section('page_heading','Ver APA')
@section('section')

<p style="text-align: right;"><a href="{{ url ('exportar_apa') }}"><i class="fa fa-print fa-fw"></i> Imprimir APA</a></p>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered">
            <tbody>
			<tr>
				<td rowspan="5" style="text-align: center;"><strong>Resume</strong></td>
				<td colspan="5" style="text-align: center;"><strong>Yate</strong></td>
			</tr>
			<tr>
				<td colspan="5" style="text-align: center;"><strong>Fecha</strong></td>
			</tr>
			<tr>
				<td style="text-align: right;"><strong>APA</strong></td>
				<td colspan="4"><span class="label label-success">$ 10.0000,00</span></td>
			</tr>
			<tr>
				<td style="text-align: right;"><strong>APA Expenses</strong></td>
				<td colspan="4"><span class="label label-default">$ 10.0000,00</span></td>
			</tr>
			<tr>
				<td style="text-align: right;"><strong>Total Balance</strong></td>
				<td colspan="2"><span class="label label-info">$ 10.0000,00</span></td>
				<td style="text-align: right;"><strong>Excess</strong></td>
				<td><span class="label label-danger">$ 10.0000,00</span></td>
			</tr>
			<tr class="warning">
				<td colspan="6" style="text-align: center;"><strong>ITINERARY AND SERVICES</strong></td>
			</tr>
			
			<tr class="warning">
				<td style="text-align: center;"><strong>DAY</strong></td>
				<td style="text-align: center;"><strong>YATE</strong></td>
				<td colspan="2" style="text-align: center;"><strong>DELUXE EXPLORER ACT.</strong></td>
				<td colspan="6" style="text-align: center;"><strong>EXTRA ACTIVITIES</strong></td>
			</tr>
			<tr>
				<td rowspan="2">-</td>
				<td><strong>AM: </strong></td>
				<td colspan="2">-</td>
				<td colspan="6">-</td>
			</tr>
			<tr>
				<td><strong>PM: </strong></td>
				<td colspan="2">-</td>
				<td colspan="6">-</td>
			</tr>
			<tr class="warning">
				<td colspan="6" style="text-align: center;"><strong>EXTRA ACTIVITIES</strong></td>
			</tr>
			<tr class="warning">
				<td style="text-align: center;"><strong>FECHA</strong></td>
				<td style="text-align: center;"><strong>UBICACIÓN</strong></td>
				<td style="text-align: center;"><strong>DETAIL</strong></td>
				<td style="text-align: center;"><strong>INVOICE LINK</strong></td>
				<td style="text-align: center;"><strong>SUBTOTAL</strong></td>
				<td style="text-align: center;"><strong>TOTAL</strong></td>
			</tr>
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr class="warning">
				<td colspan="6" style="text-align: center;"><strong>ALCOHOLIC BEVERAGES</strong></td>
			</tr>
			<tr class="warning">
				<td style="text-align: center;"><strong>QUANTITY</strong></td>
				<td colspan="2" style="text-align: center;"><strong>DETAIL</strong></td>
				<td style="text-align: center;"><strong>INVOICE LINK</strong></td>
				<td style="text-align: center;"><strong>SUBTOTAL</strong></td>
				<td style="text-align: center;"><strong>TOTAL</strong></td>
			</tr>
			<!--<tr>
				<td colspan="6" class="success" style="text-align: center;"><strong>Before Charter</strong></td>
				<td rowspan="2"></td>
			</tr>-->
			<tr>
				<td>-</td>
				<td colspan="2">-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr class="warning">
				<td colspan="6" style="text-align: center;"><strong>FOOD</strong></td>
			</tr>
			<tr class="warning">
				<td style="text-align: center;"><strong>QUANTITY</strong></td>
				<td colspan="2" style="text-align: center;"><strong>DETAIL</strong></td>
				<td style="text-align: center;"><strong>INVOICE LINK</strong></td>
				<td style="text-align: center;"><strong>SUBTOTAL</strong></td>
				<td style="text-align: center;"><strong>TOTAL</strong></td>
			</tr>
			<tr>
				<td>-</td>
				<td colspan="2">-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr class="warning">
				<td colspan="6" style="text-align: center;"><strong>LOGISTIC AND OPERATIONS</strong></td>
			</tr>
			<tr class="warning">
				<td colspan="2" style="text-align: center;"><strong>DETAIL</strong></td>
				<td colspan="2" style="text-align: center;"><strong>INVOICE LINK</strong></td>
				<td style="text-align: center;"><strong>SUBTOTAL</strong></td>
				<td style="text-align: center;"><strong>TOTAL</strong></td>
			</tr>
			<tr>
				<td colspan="2">-</td>
				<td colspan="2">-</td>
				<td>-</td>
				<td>-</td>
			</tr>
            </tbody>
        </table>   
    </div>
</div>     
@stop








